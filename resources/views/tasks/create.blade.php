<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 border border-zinc-800 p-8 rounded-xl">
                <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Task Title')" class="text-zinc-500 font-bold uppercase tracking-widest text-[10px] mb-2" />
                        <x-text-input id="title" class="block w-full bg-black border-zinc-800 text-white focus:border-zinc-500 focus:ring-0 rounded-md p-3 transition-none" type="text" name="title" :value="old('title')" required autofocus placeholder="e.g. Monthly Report" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Description')" class="text-zinc-500 font-bold uppercase tracking-widest text-[10px] mb-2" />
                        <textarea id="description" name="description" class="block w-full bg-black border-zinc-800 text-white focus:border-zinc-500 focus:ring-0 rounded-md p-3 transition-none" rows="4" placeholder="Enter task details...">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Assign To -->
                    <div>
                        <x-input-label for="employee_id" :value="__('Assign To')" class="text-zinc-500 font-bold uppercase tracking-widest text-[10px] mb-2" />
                        <select id="employee_id" name="employee_id" class="block w-full bg-black border-zinc-800 text-white focus:border-zinc-500 focus:ring-0 rounded-md p-3 transition-none">
                            <option value="">{{ __('Unassigned') }}</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-zinc-800">
                        <a href="{{ route('tasks.index') }}" class="text-zinc-500 hover:text-white text-sm font-bold transition-none">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="bg-white hover:bg-zinc-200 text-zinc-950 px-6 py-2 rounded-md font-bold text-sm transition-none">
                            {{ __('Create Task') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
