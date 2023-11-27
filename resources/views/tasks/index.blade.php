@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>
    
    <!-- Display all tasks -->
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->name }}</li>
        @endforeach
    </ul>

    <!-- Link to create a new task -->
    <a href="{{ route('tasks.create') }}">Create New Task</a>
@endsection
