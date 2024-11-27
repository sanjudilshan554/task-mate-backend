<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function all()
    {
        return Task::orderBy('selected_date_time', 'desc')->get(); // Return all tasks
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'selected_date_time' => $request['reminder_time'],
            'status' => $request['status'],
        ]);
        return $task;
        return response()->json($task, 201);
    }

    public function lastSavedTask()
    {
        return Task::latest()->first();
    }

    public function get(int $id)
    {
        return Task::find($id);
    }

    public function update(Request $request, int $id)
    {
        $task =  Task::find($id)->first();

        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->selected_date_time = $request->input('selected_date_time');
        $task->status = $request->input('status');

        $task->save();

        return response()->json(['message' => 'Task updated successfully', 'task' => $task]);
    }

        public function delete(int $id)
        {
            $task =  Task::find($id)->first();
            $task->delete();

            return response()->json(['message' => 'Task deleted successfully']);
        }

        public function update(Request $request, int $id)
    {
        $task =  Task::find($id)->first();

        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->selected_date_time = $request->input('selected_date_time');
        $task->status = $request->input('status');

        $task->save();

        return response()->json(['message' => 'Task updated successfully', 'task' => $task]);
    }
}
