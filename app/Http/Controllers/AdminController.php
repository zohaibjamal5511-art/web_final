<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VideoIdea;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Session::get('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Enforcing your explicit security profile rule
        if ($request->username === 'admin' && $request->password === 'admin') {
            Session::put('admin_authenticated', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => 'Invalid administrative operational parameters.']);
    }

    public function index()
    {
        if (!Session::get('admin_authenticated')) {
            return redirect()->route('admin.login');
        }

        // Gather all enterprise telemetric indexes
        $totalUsersCount = User::count();
        $totalIdeasCount = VideoIdea::count();
        $totalLogsCount = UserLog::count();
        $totalSystemMinutes = round(UserLog::sum('seconds_spent') / 60);

        // Fetch collections for global grid displays
        $allUsers = User::withCount(['videoIdeas', 'logs'])->latest()->get();
        $globalLogs = UserLog::with('user')->latest()->take(15)->get();
        $globalIdeas = VideoIdea::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalUsersCount',
            'totalIdeasCount',
            'totalLogsCount',
            'totalSystemMinutes',
            'allUsers',
            'globalLogs',
            'globalIdeas'
        ));
    }

    public function logout()
    {
        Session::forget('admin_authenticated');
        return redirect()->route('admin.login');
    }
}