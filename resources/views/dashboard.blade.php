<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator Workspace - CreatorMind AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="h-full text-slate-900 antialiased">

    <div class="min-h-full">
        <!-- Top Navigation Bar -->
        <nav class="border-b border-slate-200 bg-white sticky top-0 z-40 shadow-xs">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between items-center">
                    <div class="flex items-center gap-x-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 text-white font-bold shadow-md">
                            C
                        </div>
                        <span class="text-base font-bold tracking-tight text-slate-900">Creator<span class="text-indigo-600">Mind</span> <span class="text-xs font-normal text-slate-400 border border-slate-200 px-2 py-0.5 rounded-md ml-1 bg-slate-50">/work</span></span>
                    </div>
                    
                    <div class="flex items-center gap-x-6">
                        <span class="text-sm font-medium text-slate-600 hidden sm:inline">User Account: <span class="text-slate-900 font-semibold">{{ Auth::user()->name }}</span></span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm font-semibold text-slate-500 hover:text-rose-600 transition-colors">
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Subheader Console Navigation -->
        <header class="bg-white py-6 border-b border-slate-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-y-4">
                <div>
                    <h1 class="text-xl font-bold tracking-tight text-slate-900">Personal AI Blueprint Board</h1>
                    <p class="text-xs text-slate-500 mt-0.5">Generate customized media production concepts bound strictly to your profile parameters.</p>
                </div>
                
                <!-- History Jump Anchor Link Button -->
                <a href="#history-vault" class="inline-flex items-center gap-x-2 rounded-xl bg-slate-100 border border-slate-200 px-4 py-2.5 text-xs font-bold text-slate-700 shadow-xs hover:bg-slate-200 transition-all">
                    <svg class="h-3.5 w-3.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 Carlsbad 3.75h4.5m-.75 10.5l-3 3m0 0l-3-3m3 3V10.5M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                    See All Previous Saved Work ({{ count($savedIdeas) }})
                </a>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            
            <!-- Success / Failure Response Notifications -->
            @if(session('status'))
                <div class="rounded-xl bg-emerald-50 p-4 border border-emerald-200 mb-6 text-xs font-semibold text-emerald-800 flex items-center gap-2.5 shadow-xs">
                    <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="rounded-xl bg-rose-50 p-4 border border-rose-200 mb-6 text-xs font-semibold text-rose-800 shadow-xs">
                    <span class="font-bold block mb-1">Execution Error:</span>
                    <ul class="list-disc pl-4 space-y-0.5 font-medium text-rose-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Mini User Analytics Cards (User Only Context) -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 mb-8">
                <div class="rounded-xl bg-white border border-slate-200 p-5 shadow-xs">
                    <dt class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Your Blueprints Created</dt>
                    <dd class="mt-1 text-2xl font-bold text-slate-900">{{ count($savedIdeas) }} Concepts</dd>
                </div>
                <div class="rounded-xl bg-white border border-slate-200 p-5 shadow-xs">
                    <dt class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Your API Processing Compute</dt>
                    <dd class="mt-1 text-2xl font-bold text-slate-900">{{ $totalTime }} Minutes</dd>
                </div>
                <div class="rounded-xl bg-gradient-to-br from-indigo-50/60 to-white border border-slate-200 p-5 shadow-xs sm:col-span-2 lg:col-span-1">
                    <dt class="text-[10px] font-bold uppercase tracking-wider text-indigo-600">Secure Isolation Scope</dt>
                    <dd class="mt-1 text-xs font-semibold text-slate-500 leading-relaxed">Only tasks owned by your active authentication profile ID are visible inside this feed stream.</dd>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <!-- AI Generator Setup Panel -->
                <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 p-6 shadow-xs sticky top-24">
                    <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2 border-b border-slate-100 pb-2">
                        <span class="h-2 w-2 rounded-full bg-indigo-600"></span>
                        Concept Factory Engine
                    </h3>
                    
                    <form action="{{ route('ideas.generate') }}" method="POST" id="concept-generation-form" onsubmit="activateButtonLoader()">
                        @csrf
                        
                        <!-- 10 Specified Niche Categories Selection Block -->
                        <div class="mb-4">
                            <label for="category" class="block text-[11px] font-bold uppercase tracking-wide text-slate-500 mb-1.5">Select Content Category <span class="text-rose-500">*</span></label>
                            <select name="category" id="category" required class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3 py-2.5 text-xs font-semibold text-slate-800 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
                                <option value="" disabled selected>Choose a content division...</option>
                                <option value="Tech & Coding">1. Tech & Coding</option>
                                <option value="Finance & SaaS">2. Finance & SaaS</option>
                                <option value="Business & Startups">3. Business & Startups</option>
                                <option value="Lifestyle & Vlogs">4. Lifestyle & Vlogs</option>
                                <option value="Education & Science">5. Education & Science</option>
                                <option value="Gaming Ecosystems">6. Gaming Ecosystems</option>
                                <option value="Travel & Adventure">7. Travel & Adventure</option>
                                <option value="Food & Culinary Arts">8. Food & Culinary Arts</option>
                                <option value="Health & High Performance">9. Health & High Performance</option>
                                <option value="Creative Art & Design">10. Creative Art & Design</option>
                            </select>
                        </div>

                        <!-- Optional Context Focus Keyword Title Field -->
                        <div class="mb-5">
                            <label for="title_focus" class="block text-[11px] font-bold uppercase tracking-wide text-slate-500 mb-1.5">Optional Title / Suggestion Blueprint Focus</label>
                            <input type="text" name="title_focus" id="title_focus" placeholder="e.g., Laravel Tutorial, Side Hustles, Fitness" class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3 py-2.5 text-xs font-medium text-slate-800 placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
                            <p class="text-[10px] text-slate-400 mt-1 leading-normal">Forces the generator to lean towards these customized suggestions if specified.</p>
                        </div>

                        <!-- Action Submit Button with Loader Framework -->
                        <button type="submit" id="submit-action-btn" class="w-full flex items-center justify-center gap-x-2 rounded-xl bg-indigo-600 px-4 py-3 text-xs font-bold text-white shadow-md hover:bg-indigo-500 focus:outline-none transition-all">
                            <!-- Loading Spinner Element hidden via CSS initially -->
                            <svg id="button-loading-spinner" class="animate-spin h-3.5 w-3.5 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span id="button-text-string">Spin New Video Blueprint</span>
                        </button>
                    </form>
                </div>

                <!-- Live Dynamic Output / User Storage Lists -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Live Output Workspace Monitor -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs">
                        <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3 mb-4 flex items-center justify-between">
                            <span>⚡ Live Active Workspace Output Feed</span>
                            <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-md">Isolated User View</span>
                        </h3>
                        
                        @if(count($savedIdeas) === 0)
                            <div class="text-center py-10 px-4 border-2 border-dashed border-slate-200 rounded-xl bg-slate-50/50">
                                <p class="text-xs font-semibold text-slate-500">Your interactive concept feed is currently blank.</p>
                                <p class="text-[11px] text-slate-400 mt-0.5">Configure your categories and hit generate to query the open-source context model.</p>
                            </div>
                        @else
                            <div class="space-y-4 max-h-[400px] overflow-y-auto pr-1">
                                <!-- Lists only the 3 latest items to keep the dashboard workflow clean -->
                                @foreach($savedIdeas->take(3) as $idea)
                                    <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/50 hover:bg-slate-50 transition-colors">
                                        <div class="flex items-start justify-between gap-x-4">
                                            <div>
                                                <span class="inline-block px-1.5 py-0.5 rounded text-[9px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-100 uppercase tracking-wider">{{ $idea->category }}</span>
                                                <h4 class="font-bold text-slate-900 mt-2 text-sm tracking-tight">{{ $idea->title }}</h4>
                                                <p class="text-xs text-slate-500 mt-1 leading-relaxed font-normal">{{ $idea->description }}</p>
                                            </div>
                                            <span class="text-[10px] font-medium text-slate-400 whitespace-nowrap bg-white px-2 py-0.5 border border-slate-200 rounded shadow-2xs">{{ $idea->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Complete Historical Archive Repository Panel Container -->
                    <div id="history-vault" class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs scroll-mt-24">
                        <div class="border-b border-slate-100 pb-3 mb-4 flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                                    📂 Your Lifetime Vault History Archive
                                </h3>
                                <p class="text-[11px] text-slate-400 mt-0.5">Complete historical registry log entries compiled exclusively under your owner signature.</p>
                            </div>
                            <span class="text-[10px] font-bold text-slate-500 bg-slate-100 border border-slate-200 px-2.5 py-1 rounded-md">Total Saves: {{ count($savedIdeas) }}</span>
                        </div>

                        @if(count($savedIdeas) === 0)
                            <div class="text-center py-6 text-xs font-semibold text-slate-400">
                                Your safe locker archive is clean. No logged items.
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-slate-200 text-left text-xs">
                                    <thead class="bg-slate-50 text-[10px] font-bold uppercase text-slate-400 tracking-wider">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">Category Tag</th>
                                            <th scope="col" class="px-4 py-3">Generated Structural Concept Headline</th>
                                            <th scope="col" class="px-4 py-3">Logged Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 bg-white font-medium text-slate-600">
                                        @foreach($savedIdeas as $historicalIdea)
                                            <tr class="hover:bg-slate-50/40 transition-colors">
                                                <td class="whitespace-nowrap px-4 py-3">
                                                    <span class="rounded bg-slate-100 border border-slate-200 px-2 py-0.5 text-[9px] font-bold text-slate-600">{{ $historicalIdea->category }}</span>
                                                </td>
                                                <td class="px-4 py-3 text-slate-900">
                                                    <div class="font-bold text-xs">{{ $historicalIdea->title }}</div>
                                                    <div class="text-[11px] text-slate-400 font-normal mt-0.5 line-clamp-1 max-w-sm sm:max-w-md">{{ $historicalIdea->description }}</div>
                                                </td>
                                                <td class="whitespace-nowrap px-4 py-3 text-[11px] text-slate-400 font-normal">
                                                    {{ $historicalIdea->created_at->format('M d, Y - h:i A') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>

                    <!-- User Event Trail Audit System -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs">
                        <h3 class="text-xs font-bold text-slate-900 mb-3 uppercase tracking-wider text-slate-400">Recent Personal Account Event Logs</h3>
                        <div class="flow-root">
                            <ul role="list" class="-mb-8">
                                @foreach($userLogs as $index => $log)
                                    <li>
                                        <div class="relative pb-6">
                                            @if($index !== count($userLogs) - 1)
                                                <span class="absolute top-4 left-3 -ml-px h-full w-0.5 bg-slate-100" aria-hidden="true"></span>
                                            @endif
                                            <div class="relative flex space-x-3 items-center">
                                                <div class="flex h-6 w-6 items-center justify-center rounded-md bg-indigo-50 border border-indigo-100 text-[10px] font-extrabold text-indigo-600">
                                                    {{ $index + 1 }}
                                                </div>
                                                <div class="flex min-w-0 flex-1 justify-between gap-x-4 pt-0.5">
                                                    <p class="text-xs font-medium text-slate-600">{{ $log->action }}</p>
                                                    <span class="text-[10px] text-slate-400 font-mono whitespace-nowrap">{{ $log->seconds_spent }}s engine time</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Active Loader Engine Automation Script -->
    <script>
        function activateButtonLoader() {
            const btn = document.getElementById('submit-action-btn');
            const spinner = document.getElementById('button-loading-spinner');
            const txt = document.getElementById('button-text-string');

            // Force interaction lockout to prevent duplicate database mutations
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed', 'bg-indigo-500');
            
            // Render spinner vector and display execution status text
            spinner.classList.remove('hidden');
            txt.innerText = 'Structuring AI Prompts...';
        }
    </script>
</body>
</html>