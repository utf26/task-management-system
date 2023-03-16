@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tasks</h1>
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="task-list">
                    <ul class="list-group sortableList">
                        @foreach ($tasks as $task)
                            <li class="list-group-item task-item" data-task-id="{{ $task->id }}"
                                data-priority="{{ $task->priority }}">
                                <div class="row align-items-center">
                                    <div class="col-md-10 d-flex">{{ $task->name }}</div>
                                    <div class="col-md-2 text-end">
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                           class="btn btn-secondary btn-sm me-2">Edit</a>
                                        <form class="d-inline" method="POST"
                                              action="{{ route('tasks.destroy', $task->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".sortableList").sortable({
                revert: true,
                update: function (event, ui) {
                    // Select all the task list items
                    const $taskItems = $('.task-item');

                    // Loop over the task items and retrieve the task IDs
                    const taskIds = [];
                    $taskItems.each(function () {
                        const taskId = $(this).data('task-id');
                        taskIds.push(taskId);
                    });

                    $.ajax({
                        url: '/tasks/update-priority',
                        type: 'PATCH',
                        dataType: 'json',
                        data: {
                            _token: '{{ csrf_token() }}',
                            task_ids: taskIds
                        },
                        success: function (response) {
                            console.log('Priorities updated successfully.');
                        },
                        error: function (xhr, status, error) {
                            console.log('Error updating priorities: ' + error);
                        }
                    });
                }
            });

            $(".draggable").draggable({
                connectToSortable: '.sortableList',
                cursor: 'pointer',
                helper: 'clone',
                revert: 'invalid',
            });
        });
    </script>
@endsection
