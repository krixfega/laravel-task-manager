<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'due_date' => 'required', 
        ]);

        $task = new Task();
        $task->name = $validatedData['name'];
        $task->description = $validatedData['description'];
        $task->due_date = $validatedData['due_date'];

        // To determine the highest priority to place the new task at the top
        $maxPriority = Task::max('priority');
        $task->priority = $maxPriority ? $maxPriority + 1 : 1;
        $task->save();

        // To reorder priorities for all tasks
        $this->reorderPriorities();

        return response()->json(['message' => 'Task created successfully']);
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'due_date' => 'required',    
        ]);

        $task->name = $validatedData['name'];
        $task->description = $validatedData['description'];
        $task->due_date = $validatedData['due_date'];

        // Move the updated task to the bottom of the list
        $task->priority = Task::max('priority') + 1;

        $task->save();

        $this->reorderPriorities();

        return response()->json(['message' => 'Task updated successfully']);
    }

    public function reorder(Request $request)
    {
        $taskIds = $request->input('taskIds');

        // Loop through the received task IDs and update their priorities
        foreach ($taskIds as $index => $taskId) {
            $task = Task::find($taskId);
            $task->priority = $index + 1; 
            $task->save();
        }

        return response()->json(['message' => 'Tasks reordered successfully']);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
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
}
