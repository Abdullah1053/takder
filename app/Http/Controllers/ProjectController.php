<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Auth::user()->projects()->get();
        return Inertia::render('Projects/Index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not needed for this implementation
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'description' => 'nullable|string|max:5000',
        ]);

        $project = Auth::user()->projects()->create($validated);

        return redirect()->route('projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        if (Auth::user()->id !== $project->user_id) {
            abort(404);
        }

        return Inertia::render('Projects/Show', [
            'project' => $project->load('tasks'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // Not needed for this implementation
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if (Auth::user()->id !== $project->user_id) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'description' => 'nullable|string|max:5000',
        ]);

        $project->update($validated);

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (Auth::user()->id !== $project->user_id) {
            abort(404);
        }

        $project->delete();

        return redirect()->route('projects.index');
    }
}
