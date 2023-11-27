<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', //validation for the task name
        ]);

        $task = new Task();
        $task->name = $validatedData['name'];

        // To determine the highest priority to place the new task at the top
        $maxPriority = Task::max('priority');
        $task->priority = $maxPriority ? $maxPriority + 1 : 1;
        $task->save();

        // To reorder priorities for all tasks
        $this->reorderPriorities();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',    
        ]);

        $task->name = $validatedData['name'];

        // Move the updated task to the top of the list
        $task->priority = Task::max('priority') + 1;

        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        
        $task->save();

        $this->reorderPriorities();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    private function reorderPriorities()
    {
        $tasks = Task::orderBy('priority')->get();

        $priority = 1;
        foreach ($tasks as $task) {
            $task->priority = $priority++;
            $task->save();
        }
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
