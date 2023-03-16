<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Project controller
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $projects = Project::orderBy('name')->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Project::create($validatedData);

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return View
     */
    public function show(Project $project): View
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return View
     */
    public function edit(Project $project): View
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $project->update($validatedData);

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect('/projects');
    }

    /**
     * Get tasks of the project
     *
     * @param Project $project
     * @return View
     */
    public function tasks(Project $project): View
    {
        $tasks = $project->tasks()->orderBy('priority')->get();

        return view('tasks.index', compact('tasks'));
    }
}
