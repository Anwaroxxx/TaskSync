<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-white leading-tight">
                {{ __('Task Management') }}
            </h2>
            <a href="{{ route('tasks.create') }}" class="bg-white hover:bg-zinc-200 text-black px-4 py-2 rounded-md text-sm font-bold transition-none">
                {{ __('Add Task') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-zinc-950">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-lg text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left">
                        <thead>
                            <tr class="border-b border-zinc-800 bg-zinc-950/50">
                                <th class="px-6 py-4 text-xs font-bold text-zinc-500 uppercase tracking-widest">Task</th>
                                <th class="px-6 py-4 text-xs font-bold text-zinc-500 uppercase tracking-widest">Assignee</th>
                                <th class="px-6 py-4 text-xs font-bold text-zinc-500 uppercase tracking-widest">Status</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-zinc-500 uppercase tracking-widest">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-800/50">
                            @forelse ($tasks as $task)
                                <tr class="hover:bg-zinc-800/20 transition-none">
                                    <td class="px-6 py-4">
                                        <div class="text-white font-medium">{{ $task->title }}</div>
                                        <div class="text-zinc-500 text-xs mt-1 truncate max-w-xs">{{ $task->description }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-zinc-400 text-sm">{{ $task->employee?->name ?? __('Unassigned') }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($task->status === 'completed')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-emerald-500/10 text-emerald-500 border border-emerald-500/20">
                                                Done
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-amber-500/10 text-amber-500 border border-amber-500/20">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('tasks.edit', $task) }}" class="text-zinc-500 hover:text-white p-1 transition-none">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M16.243 4.757a1.5 1.5 0 112.122 2.122L12 11.828l-4 1 1-4 6.243-6.243z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Delete task?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-zinc-500 hover:text-red-400 p-1 transition-none">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-zinc-500 text-sm">
                                        No tasks found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
