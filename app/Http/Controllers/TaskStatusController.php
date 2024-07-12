<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusRequest;
use App\Models\Task_Status;
use App\Repositories\TaskStatus\TaskStatusRepositoryInterface;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    protected $taskStatusRepository;
    
    public function __construct(TaskStatusRepositoryInterface $taskStatusRepository)
    {
        $this->taskStatusRepository = $taskStatusRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $taskstatus = Task_Status::paginate(10);
        $taskstatus = $this->taskStatusRepository->all();
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
    public function store(TaskStatusRequest $request)
    {
        $this->taskStatusRepository->create($request->all());
        return redirect()->route('taskstatus.index')->with('success', 'added data successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task_Status = $this->taskStatusRepository->find($id);
        return view('tasksmanagement.taskstatus.show', compact('task_Status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task_Status = $this->taskStatusRepository->find($id);
        return view('tasksmanagement.taskstatus.edit', compact('task_Status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStatusRequest $request, $id)
    {
        $this->taskStatusRepository->update($id, $request->all());
        return redirect()->route('taskstatus.index')->with('success', 'updated data successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->taskStatusRepository->delete($id);
        return redirect()->route('taskstatus.index')->with('success', 'deleted data successfully');
    }
}
