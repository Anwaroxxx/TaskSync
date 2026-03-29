<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index(): View
    {
        $tasks = Task::with('employee')->where('manager_id', auth()->id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create(): View
    {
        $employees = User::where('role', 'participant')->get();
        return view('tasks.create', compact('employees'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'employee_id' => 'nullable|exists:users,id',
        ]);

        $task = new Task($validated);
        $task->manager_id = auth()->id();
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task): View
    {
        $this->authorizeManager($task);
        $employees = User::where('role', 'participant')->get();
        return view('tasks.edit', compact('task', 'employees'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $this->authorizeManager($task);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'employee_id' => 'nullable|exists:users,id',
            'status' => 'required|in:pending,completed',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $this->authorizeManager($task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    /**
     * Authorize that the current user is the manager of the task.
     */
    protected function authorizeManager(Task $task): void
    {
        if ($task->manager_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
