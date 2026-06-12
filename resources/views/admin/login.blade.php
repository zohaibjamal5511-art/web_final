<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Access Terminal - Control Console</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex items-center justify-center p-6 antialiased">
    <div class="w-full max-w-sm bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        <div class="text-center mb-6">
            <div class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-white font-bold mb-3">
                Ω
            </div>
            <h2 class="text-xl font-bold tracking-tight text-slate-900">Admin Control</h2>
            <p class="text-xs text-slate-400 mt-1">Authenticate Admin Dashboard</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold rounded-xl">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1.5">Username</label>
                <input type="text" name="username" required placeholder="e.g., admin" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:border-slate-900 focus:bg-white focus:outline-none transition-all">
            </div>
            <div>
                <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1.5"> Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm focus:border-slate-900 focus:bg-white focus:outline-none transition-all">
            </div>
            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-semibold py-3.5 rounded-xl text-sm transition-all shadow-sm mt-2">
                Login
            </button>
        </form>
    </div>
</body>
</html>