<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - CreatorMind AI</title>
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
        <div class="text-center mb-6">
            <div class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 text-white font-bold shadow-md mb-3">
                C
            </div>
            <h2 class="text-xl font-bold tracking-tight text-slate-900">Get Started with CreatorMind</h2>
            <p class="text-xs text-slate-400 mt-1">Setup your personal account token parameters</p>
        </div>

        <!-- Global Session Validation Feedback Banners -->
        @if ($errors->any())
            <div class="mb-4 p-3.5 bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold rounded-xl">
                <ul class="list-disc pl-4 space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Elements -->
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Full Name</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="John Doe" 
                    class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-3 text-xs font-medium text-slate-800 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
            </div>

            <div>
                <label for="email" class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Email Address</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="you@example.com" 
                    class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-3 text-xs font-medium text-slate-800 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
            </div>

            <div>
                <label for="password" class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Create Password</label>
                <input type="password" name="password" id="password" required placeholder="Minimum 8 characters" 
                    class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-3 text-xs font-medium text-slate-800 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
            </div>

            <div>
                <label for="password_confirmation" class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="••••••••" 
                    class="w-full bg-slate-50/50 border border-slate-200 rounded-xl p-3 text-xs font-medium text-slate-800 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl text-xs transition-all shadow-md mt-2">
                Provision New Workspace
            </button>
        </form>

        <!-- Dynamic Redirection Navigation Footer -->
        <div class="mt-6 border-t border-slate-100 pt-4 text-center">
            <p class="text-xs text-slate-400 font-medium">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:text-indigo-500 ml-1 transition-colors">Sign in here</a>
            </p>
        </div>
    </div>

</body>
</html>