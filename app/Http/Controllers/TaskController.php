<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all(); // Return all tasks
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'selected_date_time' => $request['reminder_time']
        ]);
        return $task;
        return response()->json($task, 201);
    }

    public function lastSavedTask()
    {
        return Task::latest()->first();
    }
}
