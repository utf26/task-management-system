@extends('layouts.app')

@section('content')
    <h1>{{ $task->name }}</h1>

    <div class="card mb-3">
        <div class="card-header">Task Details</div>
        <div class="card-body">
            <p><strong>Priority:</strong> {{ $task->priority }}</p>
            <p><strong>Created At:</strong> {{ $task->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $task->updated_at }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Task Actions</div>
        <div class="card-body">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit Task</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this task?')">Delete Task
                </button>
            </form>
        </div>
    </div>
@endsection
