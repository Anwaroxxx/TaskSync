<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TaskSync | Professional Task Management</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-black text-zinc-300 min-h-screen flex flex-col items-center justify-center selection:bg-indigo-500 selection:text-white">
        
        @if (Route::has('login'))
            <nav class="fixed top-0 right-0 p-8 flex items-center gap-6 z-10 font-medium">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-zinc-400 hover:text-white transition-none">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-zinc-400 hover:text-white transition-none">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2 bg-zinc-800 hover:bg-zinc-700 text-white rounded-md text-sm font-bold transition-none">Register</a>
                    @endif
                @endauth
            </nav>
        @endif

        <main class="relative z-10 w-full max-w-5xl px-6 py-20 flex flex-col items-center text-center">
            <div class="mb-4 text-zinc-500 font-bold uppercase tracking-widest text-xs">
                Task Management Simplified
            </div>

            <h1 class="text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 text-white text-balance">
                Professional Workflows <br/> for Modern Teams.
            </h1>
            
            <p class="text-lg text-zinc-400 max-w-2xl mb-12 leading-relaxed">
                A clean, stable interface for managing tasks between roles. No clutter, just productivity.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mb-24">
                <a href="{{ route('register') }}" class="px-10 py-4 bg-white text-zinc-950 rounded-md font-bold text-lg hover:bg-zinc-200 transition-none shadow-lg">
                    Get Started
                </a>
                <a href="#features" class="px-10 py-4 bg-zinc-900 border border-zinc-800 rounded-md font-bold text-lg hover:bg-zinc-800 transition-none">
                    Learn More
                </a>
            </div>

            <div id="features" class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <div class="p-8 bg-zinc-900 border border-zinc-800 rounded-xl text-left">
                    <h3 class="text-lg font-bold mb-2 text-white">Role Hierarchy</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed">Structured access for managers and participants to maintain clear boundaries.</p>
                </div>

                <div class="p-8 bg-zinc-900 border border-zinc-800 rounded-xl text-left">
                    <h3 class="text-lg font-bold mb-2 text-white">Direct Tracking</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed">Simple task lifecycle management from creation to completion.</p>
                </div>

                <div class="p-8 bg-zinc-900 border border-zinc-800 rounded-xl text-left">
                    <h3 class="text-lg font-bold mb-2 text-white">Minimalist Design</h3>
                    <p class="text-zinc-500 text-sm leading-relaxed text-balance">A focused environment built for speed and professional standards.</p>
                </div>
            </div>
        </main>
    </body>
</html>
