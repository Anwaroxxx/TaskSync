<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight tracking-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="p-8 bg-slate-900 border border-slate-800 shadow-2xl rounded-3xl backdrop-blur-sm">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 bg-slate-900 border border-slate-800 shadow-2xl rounded-3xl backdrop-blur-sm">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 bg-slate-900 border border-slate-800 shadow-2xl rounded-3xl backdrop-blur-sm transition-all hover:border-red-500/30">
                <div class="max-w-xl text-red-400">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
