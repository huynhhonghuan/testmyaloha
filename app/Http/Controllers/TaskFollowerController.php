<?php

namespace App\Http\Controllers;

use App\Models\Task_Follower;
use Illuminate\Http\Request;

class TaskFollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskFollower = Task_Follower::paginate(10);
        return view('tasksmanagement.taskfollowers.index', compact('taskFollower'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasksmanagement.taskfollowers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:task,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Task_Follower::create($request->all());
        return redirect()->route('taskfollowers.index')
            ->with('success', 'Task Follower created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task_Follower $task_Follower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $taskfollower = Task_Follower::findOrFail($id);
        return view('tasksmanagement.taskfollowers.edit', compact('taskfollower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'task_id' => 'required|exists:task,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $taskfollower = Task_Follower::findOrFail($id);
        $taskfollower->update($request->all());
        return redirect()->route('taskfollowers.index')
            ->with('success', 'Task Follower updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $taskfollower = Task_Follower::findOrFail($id);
        $taskfollower->delete();
        return redirect()->route('taskfollowers.index')
            ->with('success', 'Task Follower deleted successfully.');
    }


    // Your custom code here
    public function insertOne($taskId, $userId)
    {
        $taskFollower = Task_Follower::firstOrCreate([
            'task_id' => $taskId,
            'user_id' => $userId,
        ]);

        if ($taskFollower->wasRecentlyCreated)
            return true;

        return false;
    }

    public function insertMultiple(array $taskFolloweres)
    {
        $allCreated = true;

        foreach ($taskFolloweres as $pair) {
            $taskFollower = Task_Follower::firstOrCreate([
                'task_id' => $pair['task_id'],
                'user_id' => $pair['user_id'],
            ]);

            if (!$taskFollower->wasRecentlyCreated) {
                $allCreated = false;
            }
        }

        return $allCreated;
    }

    public function deleteByTaskId($taskId, $userId)
    {
        $deleteRows = Task_Follower::where([
            'task_id' => $taskId,
            'user_id' => $userId,
        ])->delete();

        if ($deleteRows > 0)
            return true;

        return false;
    }

    public function deleteByTaskId_UserId_Multiple(array $taskUserPairs)
    {
        $allDeleted = true;

        foreach ($taskUserPairs as $pair) {
            $deletedRows = Task_Follower::where([
                'task_id' => $pair['task_id'],
                'user_id' => $pair['user_id'],
            ])->delete();

            if ($deletedRows == 0) {
                $allDeleted = false;
            }
        }

        return $allDeleted;
    }
}
