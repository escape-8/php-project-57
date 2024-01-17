<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::all();
        return view('task_statuses.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = new TaskStatus();
        return view('task_statuses.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:task_statuses,name'
        ]);

        $taskStatus = new TaskStatus($data);
        $taskStatus->save();
        flash(__('messages.task_status.create'))->success();
        return redirect()->route('task_statuses.index');
    }

    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $status = TaskStatus::findORFail($id);
        return view('task_statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = TaskStatus::findORFail($id);
        $data = $this->validate($request, [
            'name' => 'required|unique:task_statuses,name,' . $status->id
        ]);
        $status->fill($data);
        $status->save();
        flash(__('messages.task_status.update'))->success();
        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = TaskStatus::findOrFail($id);
        if ($status->tasks->isNotEmpty()) {
            flash(__('messages.task_status.error_delete'))->error();
            return redirect()->route('task_statuses.index');
        }
        $status->delete();
        flash(__('messages.task_status.delete'))->success();
        return redirect()->route('task_statuses.index');
    }
}
