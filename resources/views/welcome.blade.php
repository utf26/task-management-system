@extends('layouts.app')

@section('content')
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-4">Welcome to the Task Management System</h1>
                <h2 class="lead mb-4">What would you like to manage?</h2>
                <ul class="list-unstyled d-flex justify-content-center">
                    <li class="mr-3">
                        <a href="/projects" class="btn btn-primary btn-lg px-4">Manage Projects</a>
                    </li>
                    <li>
                        <a href="/tasks" class="btn btn-secondary btn-lg px-4">Manage Tasks</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
