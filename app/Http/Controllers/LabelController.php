<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::orderBy('id')->paginate(15);
        return view('label.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $label = new Label();
        return view('label.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:1',
            'description' => 'nullable|string'
        ]);
        $label = new Label($data);
        $label->save();
        flash(__('messages.label.create'))->success();
        return redirect()->route('labels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        return view('label.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Label $label)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:1',
            'description' => 'nullable|string'
        ]);
        $label->fill($data);
        $label->save();
        flash(__('messages.label.update'))->success();
        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if ($label->tasks->isNotEmpty()) {
            flash(__('messages.label.error_delete'))->error();
            return redirect()->route('labels.index');
        }
        $label->delete();
        flash(__('messages.label.delete'))->success();
        return redirect()->route('labels.index');
    }
}
