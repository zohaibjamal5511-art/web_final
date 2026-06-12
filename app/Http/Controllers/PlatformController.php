<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VideoIdea;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PlatformController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();
        
        // Site isolation rules: only query items bound to current logged ID
        $savedIdeas = VideoIdea::where('user_id', $userId)->latest()->get();
        $userLogs = UserLog::where('user_id', $userId)->latest()->take(5)->get();
        
        $totalTimeSeconds = UserLog::where('user_id', $userId)->sum('seconds_spent');
        $totalTime = round($totalTimeSeconds / 60);

        // Isolated telemetry scopes
        $totalUsers = User::count();
        $totalTasksSaved = VideoIdea::count();

        return view('dashboard', compact(
            'totalUsers',
            'totalTasksSaved',
            'userLogs',
            'totalTime',
            'savedIdeas'
        ));
    }

    public function generateIdeas(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'title_focus' => 'nullable|string|max:255'
        ]);

        $category = $request->input('category');
        $focusKeyword = $request->input('title_focus');

        // Dynamically append context rules if user provides focal text
        $focusContext = $focusKeyword 
            ? " Heavily adjust matching titles to focus on the keyword/theme: '{$focusKeyword}'." 
            : "";

        $prompt = "Generate a JSON array containing exactly 4 unique and creative video ideas for the category '{$category}'.{$focusContext} "
                . "Each object in the array must have exactly two keys: 'title' (a short video headline) and 'description' (a 2-sentence concept outline). "
                . "Return ONLY raw JSON array. Do not include markdown formatting or backticks outside the array structure.";

        try {
            $apiKey = env('OPENROUTER_API_KEY');
            if (!$apiKey) {
                return redirect()->back()->withErrors(['error' => 'OpenRouter configuration parameter missing.']);
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'HTTP-Referer' => 'http://127.0.0.1:8000',
                'X-Title' => 'Video Workspace App'
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'openrouter/free',
                'messages' => [['role' => 'user', 'content' => $prompt]],
                'temperature' => 0.7
            ]);

            if ($response->failed()) {
                return redirect()->back()->withErrors(['error' => 'API Connection Refused: ' . $response->body()]);
            }

            $responseData = $response->json();
            $aiText = $responseData['choices'][0]['message']['content'] ?? '';
            
            $cleanJson = trim($aiText);
            $cleanJson = str_replace(['```json', '
```'], '', $cleanJson);
            $generatedIdeas = json_decode($cleanJson, true);

            if (!is_array($generatedIdeas)) {
                return redirect()->back()->withErrors(['error' => 'Structural JSON conversion exception. Try again.']);
            }

            foreach ($generatedIdeas as $idea) {
                VideoIdea::create([
                    'user_id' => Auth::id(),
                    'category' => $category,
                    'title' => $idea['title'] ?? 'Untitled Idea',
                    'description' => $idea['description'] ?? 'No text generated.',
                ]);
            }

            UserLog::create([
                'user_id' => Auth::id(),
                'action' => "Generated isolated video ideas matrix for category: {$category}" . ($focusKeyword ? " (Focus: {$focusKeyword})" : ""),
                'seconds_spent' => 45
            ]);

            return redirect()->route('dashboard')->with('status', 'AI video concepts successfully appended to your personal space!');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'System interface exception: ' . $e->getMessage()]);
        }
    }
}