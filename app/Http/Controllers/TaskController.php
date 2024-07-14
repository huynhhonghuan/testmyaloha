<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Task_Status;
use App\Models\User;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\TaskFollower\TaskFollowerRepositoryInterface;
use App\Repositories\TaskStatus\TaskStatusRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /** @var TaskRepositoryInterface */
    protected $taskstatusRepositoryInterface;
    protected $taskRepositoryInterface;
    protected $taskfollowerRepositoryInterface;
    protected $userRepositoryInterface;

    public function __construct(TaskStatusRepositoryInterface $taskstatusRepository, TaskRepositoryInterface $taskRepositoryInterface, TaskFollowerRepositoryInterface $taskFollowerRepository, UserRepositoryInterface $userRepositoryInterface)
    {
        $this->taskstatusRepositoryInterface = $taskstatusRepository;
        $this->taskRepositoryInterface = $taskRepositoryInterface;
        $this->taskfollowerRepositoryInterface = $taskFollowerRepository;
        $this->userRepositoryInterface = $userRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskRepositoryInterface->paginate(10);
        $taskstatus = $this->taskstatusRepositoryInterface->all();
        return view('tasksmanagement.task.index', compact('tasks', 'taskstatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task_statuses = $this->taskstatusRepositoryInterface->all();
        $users = $this->userRepositoryInterface->dataexcept(1);  // lấy dữ liệu ngoại trừ tài khoản admin
        return view('tasksmanagement.task.create', compact('task_statuses', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = $this->taskRepositoryInterface->create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'created_id' => 1, // admin
            'assigned_id' => $request->assigned_id,
            'status_id' => $request->status_id,
            'note' => $request->note,
        ]);

        $this->taskfollowerRepositoryInterface->create($task->id, $request->follower_id);

        return redirect()->route('task.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = $this->taskRepositoryInterface->find($id);
        return view('tasksmanagement.task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = $this->taskRepositoryInterface->find($id);
        $task_statuses = $this->taskstatusRepositoryInterface->all();
        $users = $this->userRepositoryInterface->dataexcept(1);  // lấy dữ liệu ngoại trừ tài khoản admin
        return view('tasksmanagement.task.edit', compact('task', 'task_statuses', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, $id)
    {
        $task = $this->taskRepositoryInterface->update($id, [
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'created_id' => 1, // admin
            'assigned_id' => $request->assigned_id,
            'status_id' => $request->status_id,
            'note' => $request->note,
        ]);

        $this->taskfollowerRepositoryInterface->delete($task->id);
        $this->taskfollowerRepositoryInterface->create($task->id, $request->follower_id);

        return redirect()->route('task.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->taskfollowerRepositoryInterface->delete($id);
        $this->taskRepositoryInterface->delete($id);

        return redirect()->route('task.index')
            ->with('success', 'Task deleted successfully.');
    }

    public function updateStatus(Request $request)
    {
        $task = Task::find($request->task_id);
        if ($task) {
            $task->status_id = $request->status_id;
            $task->save();
            return response()->json(['success' => 'Status updated successfully!']);
        }
        return response()->json(['error' => 'Task not found!'], 404);
    }
}
