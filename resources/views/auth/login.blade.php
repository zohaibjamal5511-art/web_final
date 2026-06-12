<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - CreatorMind AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="h-full flex items-center justify-center p-6 antialiased">

    <div class="w-full max-w-md bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        <!-- Brand Identity Row -->
        <div class="text-center mb-8">
            <div class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 text-white font-bold shadow-md mb-3">
                C
            </div>
            <h2 class="text-xl font-bold tracking-tight text-slate-900">Welcome back to CreatorMind</h2>
            <p class="text-xs text-slate-400 mt-1">Sign in to access your custom AI production workspace</p>
        </div>

        <!-- Global Session Validation Feedback Banners -->
        @if(session('status'))
            <div class="mb-4 p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold rounded-xl">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3.5 bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold rounded-xl">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form Elements -->
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="email" class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Email Address</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="you@example.com" 
                    class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-3 text-xs font-medium text-slate-800 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
            </div>

            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label for="password" class="block text-[11px] font-bold uppercase tracking-wider text-slate-500">Password</label>
                </div>
                <input type="password" name="password" id="password" required placeholder="••••••••" 
                    class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-3 text-xs font-medium text-slate-800 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
            </div>

            <!-- Remember System Flag Checkbox -->
            <div class="flex items-center justify-between pt-1">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember" class="ml-2 text-xs font-medium text-slate-500 select-none">Remember this session</label>
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl text-xs transition-all shadow-md mt-2">
                Login
            </button>
        </form>

        <!-- Dynamic Redirection Navigation Footer -->
        <div class="mt-6 border-t border-slate-100 pt-4 text-center">
            <p class="text-xs text-slate-400 font-medium">
                New to the platform? 
                <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:text-indigo-500 ml-1 transition-colors">Create your account</a>
            </p>
        </div>
    </div>

</body>
</html>