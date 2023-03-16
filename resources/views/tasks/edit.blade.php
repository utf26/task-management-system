@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
        </div>

        <div class="mb-3">
            <label for="priority">Priority</label>
            <input type="number" class="form-control" id="priority" name="priority" value="{{ $task->priority }}">
        </div>

        <div class="mb-3">
            <label for="project_id">Project</label>
            <select name="project_id" id="project_id" class="form-control">
                <option value="">Select a project</option>
                @foreach ($projects as $project)
                    <option selected="{{ $task->project_id === $project->id}}" value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection
