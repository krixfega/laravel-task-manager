@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Task</h1>

        <!-- Task creation form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Task Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <!-- Add other fields as needed -->
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Create Task</button>
                </form>
            </div>
        </div>
    </div>
@endsection
