<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User Profile Info -->
                <div class="bg-zinc-900 border border-zinc-800 p-8 rounded-xl flex items-center gap-4">
                    <div class="w-12 h-12 bg-zinc-800 rounded-full flex items-center justify-center text-zinc-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg leading-tight">{{ Auth::user()->name }}</h3>
                        <p class="text-zinc-500 text-sm font-medium uppercase tracking-wider">{{ Auth::user()->role }} Account</p>
                    </div>
                </div>

                <!-- Portal Links -->
                <div class="bg-zinc-900 border border-zinc-800 p-8 rounded-xl">
                    <h3 class="text-zinc-500 font-bold uppercase tracking-widest text-xs mb-4">Portals</h3>
                    <div class="space-y-3">
                        @if(Auth::user()->isOrganizer())
                            <a href="{{ route('organizer') }}" class="flex items-center justify-between p-4 bg-zinc-800 hover:bg-zinc-700 rounded-lg transition-none">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                    <span class="text-white font-medium">Manage Tasks</span>
                                </div>
                                <svg class="w-4 h-4 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @endif

                        @if(Auth::user()->isParticipant())
                            <a href="{{ route('participant') }}" class="flex items-center justify-between p-4 bg-zinc-800 hover:bg-zinc-700 rounded-lg transition-none">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <span class="text-white font-medium">My Tasks</span>
                                </div>
                                <svg class="w-4 h-4 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="mt-8 bg-zinc-900 border border-zinc-800 p-8 rounded-xl">
                <h3 class="text-white font-bold mb-4">Overview</h3>
                <p class="text-zinc-500 leading-relaxed max-w-2xl">
                    Welcome to your professional workspace. This dashboard provides quick access to your task management tools and account settings. Use the links above to navigate to your specific role environment.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
