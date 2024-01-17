<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = TaskStatus::all()->sortBy('id');
        $tasks = Task::paginate(15);
        return view('task.index', compact('tasks', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $statuses = TaskStatus::all();
        $task = new Task();
        return view('task.create', compact('task', 'statuses', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:1',
            'status_id' => 'required|integer',
            'description' => 'nullable|string',
            'created_by_id' => 'integer',
            'assigned_to_id' => 'nullable|integer'
        ]);
        $request->user()->tasks()->create($data);
        flash(__('views.task.create'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $statuses = TaskStatus::all();
        return view('task.edit', compact('task', 'users', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:1',
            'status_id' => 'required|integer',
            'description' => 'nullable|string',
            'created_by_id' => 'integer',
            'assigned_to_id' => 'nullable|integer'
        ]);
        $task->fill($data);
        $task->save();
        flash(__('views.task.update'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        flash(__('views.task.delete'))->success();
        return redirect()->route('tasks.index');
    }
}
