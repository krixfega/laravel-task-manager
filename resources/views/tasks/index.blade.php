@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>My Tasks</h1>
        
        <!-- Task List -->
        <div class="card">
            <div class="card-body">
                <ul class="list-group">
                    @forelse($tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $task->name }}</span>
                            <div class="btn-group" role="group" aria-label="Task Actions">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary mx-1 btn-sm">Edit</a>
                                <!-- Delete Modal Trigger Button -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$task->id}}">
                                    Delete
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$task->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{$task->id}}">Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this task?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">No tasks found</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Create New Task Button -->
        <a href="{{ route('tasks.create') }}" class="btn btn-success mt-3">Create New Task</a>
    </div>
@endsection
