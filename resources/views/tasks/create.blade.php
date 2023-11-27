@extends('layouts.app')

@section('content')
    <h1>Create New Task</h1>

    <!-- Task creation form -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="name">Task Name:</label>
        <input type="text" id="name" name="name" required>
        <!-- Add other fields as needed -->
        <button type="submit">Create Task</button>
    </form>
@endsection
