<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Task_Status;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskRepository;
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tasks = Task::paginate(10);
        $tasks = $this->taskRepository->all();
        return view('tasksmanagement.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task_statuses = Task_Status::all();
        return view('tasksmanagement.task.create', compact('task_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string|max:255',
        //     'deadline' => 'required|date',
        //     'user_id' => 'required|array',
        //     'user_id.*' => 'exists:users,id',
        //     'status_id' => 'required|exists:taskstatus,id',
        // ]);

        // $task = Task::create($request->all());

        // if ($task) {
        //     $allInserted = true;
        //     $taskFollowerController = new TaskFollowerController();

        //     foreach ($request->user_id as $id) {
        //         if (!$taskFollowerController->insertOne($task->id, $id)) {
        //             $allInserted = false;
        //         }
        //     }

        //     if (!$allInserted) {
        //         return redirect()->route('tasksmanagement.task.index')
        //             ->with('error', 'Task created, but some followers could not be added.');
        //     }
        // }


        return redirect()->route('tasksmanagement.task.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasksmanagement.task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasksmanagement.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'deadline' => 'required|date',
            'user_id' => 'required|array',
            'user_id.*' => 'exists:users,id',
            'status_id' => 'required|exists:taskstatus,id',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('tasksmanagement.task.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();
        return redirect()->route('tasksmanagement.task.index')
            ->with('success', 'Task deleted successfully.');
    }
}
