@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->name }}</h1>

        <a href="/projects/{{ $project->id }}/edit">Edit Project</a>

        <form action="/projects/{{ $project->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Project</button>
        </form>
    </div>
@endsection
