<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        $project = Project::findOrFail($validated['project_id']);

        if (Auth::user()->id !== $project->user_id) {
            abort(404);
        }

        $project->tasks()->create([
            'title' => $validated['title'],
        ]);

        return redirect()->back()->with('success', 'Task created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if (Auth::user()->id !== $task->project->user_id) {
            abort(404);
        }

        $validated = $request->validate([
            'status' => ['required', 'string', Rule::in(['Backlog', 'To-Do', 'In Progress', 'Done'])],
        ]);

        $task->update($validated);

        return redirect()->back()->with('success', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (Auth::user()->id !== $task->project->user_id) {
            abort(404);
        }

        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }
}
