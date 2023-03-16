@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Project</h1>

        <form action="/projects" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    required
                />
            </div>

            <button type="submit" class="btn btn-primary">Create Project</button>
        </form>
    </div>
@endsection
