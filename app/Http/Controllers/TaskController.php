<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = Task::orderBy('priority')->get();
        return view('task.index', compact('tasks'));
    }
    public function taskList(Request $request)
    {

        return Task::all();
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(UpdateTaskRequest $request)
    {
        //update task name in task table
        $task = Task::find($request->id);
        $task->task_name = $request->name;
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $highestPriority = Task::max('priority');
        $newPriority = $highestPriority + 1;
        $task = new Task();
        $task->task_name = $request->name;
        $task->priority = $newPriority;
        $task->save();



        return redirect()->route('tasks.index')->with('success', 'Task added successfully. Priority: ' . $newPriority);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }

        $priorityToUpdate = $task->priority;

        $task->delete();

        // Update priorities of remaining tasks
        Task::where('priority', '>', $priorityToUpdate)->decrement('priority');

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
    public function updatePositions(Request $request)
    {
        $positions = $request->input('positions');

        foreach ($positions as $index => $taskId) {
            $task = Task::findOrFail($taskId);
            $task->update(['priority' => $index + 1]); // Update priority
        }

        return redirect()->route('tasks.index')->with('success', 'Positions updated successfully');
    }
}
