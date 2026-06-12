<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Center Terminal — System Monitor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="h-full text-slate-800 antialiased">

    <!-- Admin Nav -->
    <nav class="border-b border-slate-200 bg-slate-900 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between items-center">
                <div class="flex items-center gap-x-3">
                    <span class="bg-white/10 px-2.5 py-1 rounded-md text-xs font-mono text-indigo-400 border border-white/5">ROOT</span>
                    <span class="text-sm font-bold tracking-tight">CreatorMind <span class="text-slate-400 font-normal">Global Master Console</span></span>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-xs bg-rose-600/20 text-rose-400 border border-rose-500/20 hover:bg-rose-600 hover:text-white font-bold py-2 px-3 rounded-lg transition-all">
                        Unmount System Console
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        
        <!-- Global Platform Telemetry Indicators -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mb-10">
            <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-xs">
                <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Registered User Shells</dt>
                <dd class="mt-1.5 text-3xl font-extrabold text-slate-900">{{ $totalUsersCount }} Profiles</dd>
            </div>
            <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-xs">
                <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Total AI Generated Records</dt>
                <dd class="mt-1.5 text-3xl font-extrabold text-indigo-600">{{ $totalIdeasCount }} Rows</dd>
            </div>
            <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-xs">
                <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Log Entries Captured</dt>
                <dd class="mt-1.5 text-3xl font-extrabold text-slate-900">{{ $totalLogsCount }} Actions</dd>
            </div>
            <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-xs">
                <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Ecosystem Compute Time</dt>
                <dd class="mt-1.5 text-3xl font-extrabold text-emerald-600">{{ $totalSystemMinutes }} Minutes</dd>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- User Database Directory Grid -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-xs">
                    <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <span>👥 Master Account User Directory</span>
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200 text-left text-xs font-medium">
                            <thead class="bg-slate-50 text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                <tr>
                                    <th class="px-4 py-3">Account Parameter Name</th>
                                    <th class="px-4 py-3">Email Address Shell</th>
                                    <th class="px-4 py-3 text-center">Saves</th>
                                    <th class="px-4 py-3 text-center">Logs</th>
                                    <th class="px-4 py-3">Date Registered</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                                @foreach($allUsers as $user)
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="px-4 py-3.5 font-bold text-slate-900">{{ $user->name }}</td>
                                        <td class="px-4 py-3.5 font-mono text-slate-500">{{ $user->email }}</td>
                                        <td class="px-4 py-3.5 text-center font-bold text-indigo-600 bg-indigo-50/30">{{ $user->video_ideas_count }}</td>
                                        <td class="px-4 py-3.5 text-center font-bold text-slate-500">{{ $user->logs_count }}</td>
                                        <td class="px-4 py-3.5 text-slate-400 font-normal">{{ $user->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Global AI Gen Feeds -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-xs">
                    <h3 class="text-sm font-bold text-slate-900 mb-4">✨ Global AI Content Stream Log (Last 10 Actions)</h3>
                    <div class="space-y-3.5">
                        @foreach($globalIdeas as $idea)
                            <div class="p-3.5 rounded-xl border border-slate-100 bg-slate-50/40 text-xs">
                                <div class="flex justify-between font-bold mb-1">
                                    <span class="text-slate-900">{{ $idea->title }}</span>
                                    <span class="text-slate-400 font-mono font-normal">Owner: {{ $idea->user->name ?? 'System' }}</span>
                                </div>
                                <p class="text-slate-500 font-normal mb-1.5">{{ $idea->description }}</p>
                                <span class="bg-slate-100 px-2 py-0.5 rounded text-[10px] text-slate-500 font-bold border border-slate-200/60">{{ $idea->category }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Hand System Telemetry Log Stream -->
            <div class="lg:col-span-1">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-xs sticky top-6">
                    <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3 mb-4">
                        🚨 Real-time Global Event Audit Tracker
                    </h3>
                    <div class="flow-root">
                        <ul class="-mb-8 text-xs font-medium">
                            @foreach($globalLogs as $index => $log)
                                <li>
                                    <div class="relative pb-6">
                                        @if($index !== count($globalLogs) - 1)
                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-slate-100"></span>
                                        @endif
                                        <div class="relative flex space-x-3 items-start">
                                            <div class="bg-slate-100 h-8 w-8 rounded-lg border border-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-500">
                                                {{ $index + 1 }}
                                            </div>
                                            <div class="flex-1 pt-1.5">
                                                <p class="text-slate-900 font-bold mb-0.5">{{ $log->user->name ?? 'Anonymous' }}</p>
                                                <p class="text-slate-500 font-normal leading-relaxed">{{ $log->action }}</p>
                                                <span class="text-[10px] text-slate-400 block mt-1 font-normal">{{ $log->created_at->diffForHumans() }}</span>
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

</body>
</html>