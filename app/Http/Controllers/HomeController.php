<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Display a listing of the tasks for the organizer.
     */
    public function indexOrganizer(): View
    {
        $tasks = Task::with('employee')->where('manager_id', auth()->id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Display a listing of the assigned tasks for the participant.
     */
    public function indexParticipant(): View
    {
        $tasks = Task::with('manager')->where('employee_id', auth()->id())->latest()->get();
        return view('employee.tasks.index', compact('tasks'));
    }

    /**
     * Update the status of the task for the participant.
     */
    public function updateStatus(Request $request, Task $task): RedirectResponse
    {
        if ($task->employee_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,completed',
        ]);

        $task->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Task status updated.');
    }
}
