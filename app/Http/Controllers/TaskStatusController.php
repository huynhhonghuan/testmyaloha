<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Task_Status;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskstatus = Task_Status::paginate(10);
        return view('tasksmanagement.taskstatus.index', compact('taskstatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasksmanagement.taskstatus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:task_status|max:255',
        ]);
        Task_Status::create($request->all());
        return redirect()->route('taskstatus.index')->with('success', 'added data successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task_Status $task_Status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task_Status $task_Status)
    {
        return view('tasksmanagement.taskstatus.edit', compact('task_Status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task_Status $task_Status)
    {
        $request->validate([
            'name' => 'required|unique:task_statuses,name,' . $task_Status->id,
        ]);
        $task_Status->update($request->all());
        return redirect()->route('taskstatus.index')->with('success', 'updated data successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task_Status = Task_Status::findOrFail($id);
        $task_Status->delete();
        return redirect()->route('taskstatus.index')->with('success', 'deleted data successfully');
    }
}
