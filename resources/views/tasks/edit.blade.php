<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-zinc-950">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-900 border border-zinc-800 p-8 rounded-xl">
                <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Task Title')" class="text-zinc-500 font-bold uppercase tracking-widest text-[10px] mb-2" />
                        <x-text-input id="title" class="block w-full bg-zinc-950 border-zinc-800 text-white focus:border-zinc-500 focus:ring-0 rounded-md p-3 transition-none" type="text" name="title" :value="old('title', $task->title)" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Description')" class="text-zinc-500 font-bold uppercase tracking-widest text-[10px] mb-2" />
                        <textarea id="description" name="description" class="block w-full bg-zinc-950 border-zinc-800 text-white focus:border-zinc-500 focus:ring-0 rounded-md p-3 transition-none" rows="4">{{ old('description', $task->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Assign To -->
                        <div>
                            <x-input-label for="employee_id" :value="__('Assign To')" class="text-zinc-500 font-bold uppercase tracking-widest text-[10px] mb-2" />
                            <select id="employee_id" name="employee_id" class="block w-full bg-zinc-950 border-zinc-800 text-white focus:border-zinc-500 focus:ring-0 rounded-md p-3 transition-none">
                                <option value="">{{ __('Unassigned') }}</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ old('employee_id', $task->employee_id) == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('employee_id')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="status" :value="__('Status')" class="text-zinc-500 font-bold uppercase tracking-widest text-[10px] mb-2" />
                            <select id="status" name="status" class="block w-full bg-zinc-950 border-zinc-800 text-white focus:border-zinc-500 focus:ring-0 rounded-md p-3 transition-none">
                                <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                                <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>{{ __('Done') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-zinc-800">
                        <a href="{{ route('tasks.index') }}" class="text-zinc-500 hover:text-white text-sm font-bold transition-none">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="bg-white hover:bg-zinc-200 text-zinc-950 px-6 py-2 rounded-md font-bold text-sm transition-none">
                            {{ __('Save Changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
