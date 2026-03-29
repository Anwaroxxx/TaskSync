<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight">
            {{ __('My Tasks') }}
        </h2>
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
                                <th class="px-6 py-4 text-xs font-bold text-zinc-500 uppercase tracking-widest">Organizer</th>
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
                                    <td class="px-6 py-4 text-sm text-zinc-400">
                                        {{ $task->manager->name }}
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
                                        @if($task->status === 'pending')
                                            <form action="{{ route('tasks.status.update', $task) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-md text-[10px] font-bold uppercase transition-none">
                                                    Mark Done
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-zinc-600 text-[10px] font-bold uppercase tracking-widest">Completed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-zinc-500 text-sm">
                                        No tasks assigned.
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
