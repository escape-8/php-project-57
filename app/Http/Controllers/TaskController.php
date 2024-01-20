<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id')
            ])->orderBy('id')->paginate(15);
        $statuses = TaskStatus::orderBy('id')->get();
        $users = User::orderBy('id')->get();
        $filter = $request->query('filter');
        return view('task.index', compact('tasks', 'statuses', 'users', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('id')->get();
        $statuses = TaskStatus::orderBy('id')->get();
        $labels = Label::orderBy('id')->get();
        $task = new Task();
        return view('task.create', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $labelsIds = $request->input('labels');
        $task = $request->user()->tasks()->create($data);
        $task->labels()->attach($labelsIds);
        flash(__('messages.task.create'))->success();
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
        $users = User::orderBy('id')->get();
        $statuses = TaskStatus::orderBy('id')->get();
        $labels = Label::orderBy('id')->get();
        return view('task.edit', compact('task', 'users', 'statuses', 'labels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();
        $labelsIds = $request->input('labels');
        $task->fill($data);
        $task->labels()->sync($labelsIds);
        $task->save();
        flash(__('messages.task.update'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        flash(__('messages.task.delete'))->success();
        return redirect()->route('tasks.index');
    }
}
