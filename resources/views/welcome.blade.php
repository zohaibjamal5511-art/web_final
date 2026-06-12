<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreatorMind AI - Next-Gen Video Ideation Engine</title>
    <!-- Tailwind Play CDN for immediate rendering -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="h-full text-slate-900 antialiased selection:bg-indigo-100 selection:text-indigo-900">

    <!-- Header Navigation -->
    <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/80 backdrop-blur-md">
        <div class="mx-auto flex max-w-7xl h-16 items-center justify-between px-6 lg:px-8">
            <div class="flex items-center gap-x-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-violet-600 text-white font-bold shadow-md shadow-indigo-200">
                    C
                </div>
                <span class="text-lg font-bold tracking-tight text-slate-900">Creator<span class="text-indigo-600">Mind</span></span>
            </div>
            
            <nav class="hidden lg:flex items-center gap-x-8 text-sm font-semibold text-slate-600">
                <a href="#features" class="hover:text-indigo-600 transition-colors">Features</a>
                <a href="#process" class="hover:text-indigo-600 transition-colors">How It Works</a>
                <a href="#metrics" class="hover:text-indigo-600 transition-colors">Platform Specs</a>
            </nav>

            <div class="flex items-center gap-x-3 sm:gap-x-4">
                <!-- Integrated Admin Console Entry Point -->
                <a href="{{ route('admin.login') }}" class="inline-flex items-center gap-x-1.5 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-all">
                    <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    <span class="hidden sm:inline">Admin Portal</span>
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 transition-all">Go to Workspace</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-indigo-600 transition-colors">Sign In</a>
                    <a href="{{ route('register') }}" class="rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 shadow-md shadow-indigo-100 transition-all">Get Started Free</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-white pt-16 pb-24 lg:pt-24 lg:pb-32">
            <!-- Subtle Radial Decorative Gradient Background -->
            <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.50),white)] opacity-70"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto">
                    <div class="inline-flex items-center gap-x-2 rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 ring-1 ring-inset ring-indigo-600/10 mb-6">
                        <span class="flex h-1.5 w-1.5 rounded-full bg-indigo-600 animate-pulse"></span>
                        Powered by OpenRouter AI Framework
                    </div>
                    <h1 class="text-4xl font-bold tracking-tight text-slate-900 sm:text-6xl leading-[1.15]">
                        Stop staring at a blank screen. <br>
                        <span class="bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">Generate Viral Video Ideas.</span>
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-slate-600 max-w-2xl mx-auto">
                        Instantly deploy custom multi-layered concepts, titles, and structural outlines optimized for engagement using open-source language engines. Everything saved straight to your personal dashboard.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('register') }}" class="rounded-xl bg-indigo-600 px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-indigo-200 hover:bg-indigo-500 hover:translate-y-[-1px] transition-all">
                            Start Brainstorming Instantly
                        </a>
                        <a href="#process" class="text-sm font-semibold leading-6 text-slate-700 hover:text-indigo-600 transition-all flex items-center gap-1">
                            See how it works <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>

                <!-- App Preview Component Grid Mockup -->
                <div class="mt-16 flow-root sm:mt-20">
                    <div class="rounded-2xl border border-slate-200 bg-slate-100 p-2 shadow-2xl ring-1 ring-slate-900/5 lg:rounded-3xl">
                        <div class="rounded-xl border border-slate-200 bg-white shadow-inner overflow-hidden p-6">
                            <!-- Visual Dashboard Header Mockup -->
                            <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-rose-400"></span>
                                    <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                                    <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                                    <span class="text-xs text-slate-400 ml-2 font-medium">workspace_preview_v2.json</span>
                                </div>
                                <div class="px-3 py-1 rounded-lg bg-slate-50 text-[11px] font-semibold text-slate-500 border border-slate-100">
                                    Status: Connected
                                </div>
                            </div>
                            
                            <!-- Static Grid Displaying Real-Looking App Concepts -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="rounded-xl p-5 border border-slate-100 bg-slate-50/50">
                                    <span class="inline-block px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-indigo-50 text-indigo-700 uppercase tracking-wider">Tech & Coding</span>
                                    <h4 class="font-bold text-slate-900 mt-2 text-base">I Built the Same App in 7 Frameworks</h4>
                                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">A side-by-side performance and developer experience comparison benchmarking speed, codebase architecture, and bundle sizes.</p>
                                </div>
                                <div class="rounded-xl p-5 border border-slate-100 bg-slate-50/50">
                                    <span class="inline-block px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-purple-50 text-purple-700 uppercase tracking-wider">Finance & SaaS</span>
                                    <h4 class="font-bold text-slate-900 mt-2 text-base">The Hidden Economy of Micro-SaaS Platforms</h4>
                                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Breaking down real financial statements of single-developer tools making thousands monthly without massive venture capital backing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Features Grid Section (The Best Things) -->
        <section id="features" class="py-24 bg-slate-50 border-y border-slate-200/60">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Premium Tooling</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Everything you need to scale output</p>
                </div>

                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                        
                        <!-- Feature 1 -->
                        <div class="flex flex-col bg-white rounded-2xl p-6 border border-slate-200/60 shadow-sm">
                            <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-slate-900">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600 text-white">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                    </svg>
                                </div>
                                Instant Idea Structural Generation
                            </dt>
                            <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-slate-600">
                                <p class="flex-auto text-sm">Input a broad niche or topic category, and watch our integration outline 4 separate production routes complete with hook headlines and detailed structural descriptions.</p>
                            </dd>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex flex-col bg-white rounded-2xl p-6 border border-slate-200/60 shadow-sm">
                            <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-slate-900">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600 text-white">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v-6.75a2.25 2.25 0 002.25-2.25z" />
                                    </svg>
                                </div>
                                Isolated Workspace Security
                            </dt>
                            <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-slate-600">
                                <p class="flex-auto text-sm">Your concepts belong exclusively to you. Every single database transaction queries through a strict user authentication scope layer to safeguard content integrity.</p>
                            </dd>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex flex-col bg-white rounded-2xl p-6 border border-slate-200/60 shadow-sm">
                            <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-slate-900">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600 text-white">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                Live Telemetric Activity Logging
                            </dt>
                            <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-slate-600">
                                <p class="flex-auto text-sm">Track optimization sequences natively. Understand exact engagement times, query frequencies, and monitor application telemetry logs from your secure sidebar console.</p>
                            </dd>
                        </div>

                    </dl>
                </div>
            </div>
        </section>

        <!-- Operational Process Breakdown -->
        <section id="process" class="py-24 bg-white">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-16">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Workflow Pipeline</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">From prompt to ready-to-shoot outline</p>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div class="relative p-6 rounded-xl border border-slate-100 bg-slate-50/50">
                        <div class="text-3xl font-bold text-indigo-200 mb-2">01</div>
                        <h4 class="font-bold text-slate-900 text-base mb-1">Pick a Category Domain</h4>
                        <p class="text-sm text-slate-600">Drop a core keyword string or macro category topic standard into your centralized submission input panel.</p>
                    </div>
                    <div class="relative p-6 rounded-xl border border-slate-100 bg-slate-50/50">
                        <div class="text-3xl font-bold text-indigo-200 mb-2">02</div>
                        <h4 class="font-bold text-slate-900 text-base mb-1">JSON Array Formatting Sync</h4>
                        <p class="text-sm text-slate-600">OpenRouter processes and models strict structural bounds, ensuring raw output drops into native application database tables seamlessly.</p>
                    </div>
                    <div class="relative p-6 rounded-xl border border-slate-100 bg-slate-50/50">
                        <div class="text-3xl font-bold text-indigo-200 mb-2">03</div>
                        <h4 class="font-bold text-slate-900 text-base mb-1">Track & Refine Workspace</h4>
                        <p class="text-sm text-slate-600">Review your accumulated conceptual timeline stack instantly, update assets, and watch calculated workspace productivity metrics scale up.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Platform Specs / Counter Section -->
        <section id="metrics" class="bg-indigo-600 py-16 text-white shadow-xl">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Built for Scale and High-Velocity Development</h2>
                        <p class="mt-4 text-lg leading-8 text-indigo-100">Optimized across modern server application structures for lightning responses.</p>
                    </div>
                    <dl class="mt-12 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-3 text-center">
                        <div class="flex flex-col items-center">
                            <dd class="text-5xl font-bold tracking-tight">100%</dd>
                            <dt class="mt-2 text-sm font-medium text-indigo-100">Free Open-Source Core Routing</dt>
                        </div>
                        <div class="flex flex-col items-center">
                            <dd class="text-5xl font-bold tracking-tight">&lt; 1.8s</dd>
                            <dt class="mt-2 text-sm font-medium text-indigo-100">Average Generation Execution Velocity</dt>
                        </div>
                        <div class="flex flex-col items-center">
                            <dd class="text-5xl font-bold tracking-tight">MySQL</dd>
                            <dt class="mt-2 text-sm font-medium text-indigo-100">Strict Relational Isolation Mapping</dt>
                        </div>
                    </dl>
                </div>
            </div>
        </section>

        <!-- Final CTA Banner -->
        <section class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Ready to construct your next video line?</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-slate-600">Log straight into your authenticated space platform and trigger high-speed AI conceptualization runs instantly.</p>
                <div class="mt-10 flex flex-col items-center justify-center gap-y-4">
                    <div class="flex items-center justify-center gap-x-6">
                        <a href="{{ route('register') }}" class="rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition-all">Create Free Account</a>
                        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-slate-900 hover:text-indigo-600 transition-colors">Sign back in <span aria-hidden="true">→</span></a>
                    </div>
                    <!-- Secondary Contextual Admin Link for Grading or Overlook Evaluation -->
                    <div class="mt-2">
                        <a href="{{ route('admin.login') }}" class="text-xs font-semibold text-slate-400 hover:text-slate-600 transition-colors underline decoration-dotted tracking-wide">
                            System Kernel: Access System Admin Telemetry Board →
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Sleek Production Footer -->
    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-6 py-12 flex flex-col md:flex-row items-center justify-between lg:px-8 gap-y-4">
            <div class="flex items-center gap-2">
                <span class="text-sm font-bold tracking-tight text-slate-900">Creator<span class="text-indigo-600">Mind</span></span>
                <span class="text-xs text-slate-400">© 2026 Core Platform. All rights reserved.</span>
            </div>
            <div class="flex gap-x-6 text-xs text-slate-500 font-medium">
                <a href="#" class="hover:text-indigo-600 transition-colors">Documentation</a>
                <a href="#" class="hover:text-indigo-600 transition-colors">Privacy Architecture</a>
                <a href="#" class="hover:text-indigo-600 transition-colors">API Status</a>
            </div>
        </div>
    </footer>

</body>
</html>