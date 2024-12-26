<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; 
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    

    public function index()
    {
        $user = auth()->user();

        $tasks = $user->tasks;
        return view('tasks.index', compact('tasks'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $user->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
            'user_id' => $user->id
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in progress,completed',
        ]);

        $task->update($request->only(['title', 'description', 'status']));

        return redirect()->route('tasks.index')->with('success', 'Task Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
       
   

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted Successfully');
        
    }
}
