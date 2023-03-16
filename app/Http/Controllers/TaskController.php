<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Task controller
 */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $tasks = Task::orderBy('priority')->get();
        $projects = Project::all();

        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $projects = Project::all();

        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'       => 'required',
            'priority'   => 'required|integer',
            'project_id' => 'required|exists:projects,id',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('message', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return View
     */
    public function edit(Task $task): View
    {
        $projects = Project::all();

        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $validated = $request->validate([
            'name'       => 'required',
            'priority'   => 'required|integer',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('message', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('message', 'Task deleted successfully.');
    }

    /**
     * Update Priority of tasks
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updatePriority(Request $request): JsonResponse
    {
        Task::reorder($request->input('task_ids'));

        return response()->json(['success' => true]);
    }
}
