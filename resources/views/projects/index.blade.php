@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Project List</h3>
                        <div>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Tasks</a>
                            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Project</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($projects as $project)
                                <li class="list-group-item" data-id="{{ $project->id }}">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-column">
                                            <a class="mb-0 font-weight-bold text-decoration-none text-dark"
                                               href="{{ route('projects.tasks', $project) }}">{{ $project->name }}</a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('projects.edit', $project) }}"
                                               class="btn btn-sm btn-outline-secondary mr-1">Edit</a>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you sure you want to delete this project?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
