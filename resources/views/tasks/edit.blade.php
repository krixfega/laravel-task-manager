@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Task</h1>

        <!-- Task edit form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Task Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
                        <!-- Add other fields populated with task data -->
                    </div>
                    <button type="submit" class="btn btn-primary mt-1">Update Task</button>
                </form>
            </div>
        </div>
    </div>
@endsection
