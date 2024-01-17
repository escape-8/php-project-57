@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div>
        {{ Form::label('name', __('views.task.form.name')) }}
    </div>
    <div class="mt-2">
        {{ Form::text('name', $task->name ?? null, ['class' => 'rounded border-gray-300 w-1/3',
                                      'id' => 'name'
                                      ]) }}
    </div>
    <div class="mt-2">
        {{ Form::label('description', __('views.task.form.description')) }}
    </div>
    <div>
        {{ Form::textarea('description', $task->description ?? null, ['class' => 'rounded border-gray-300 w-1/3 h-32',
                                                'cols' => 50,
                                                'rows' => 10,
                                                'id' => 'description'
                                                ]) }}
    </div>
    <div class="mt-2">
        {{ Form::label('status_id', __('views.task.form.status')) }}
    </div>
    <div>
        {{ Form::select('status_id', ['' => '----------'] + $statuses->pluck('name', 'id')->toArray(),
                        $task->status_id ?? '',
                        ['class' => 'rounded border-gray-300 w-1/3', 'id' => 'status_id']) }}
    </div>
    <div class="mt-2">
        {{ Form::label('assigned_to_id', __('views.task.form.executor')) }}
    </div>
    <div>
        {{ Form::select('assigned_to_id', ['' => '----------'] + $users->pluck('name', 'id')->toArray(),
                        $task->assigned_to_id ?? '',
                        ['class' => 'rounded border-gray-300 w-1/3', 'id' => 'assigned_to_id']) }}
    </div>
    <div class="mt-2">
        <label for="labels">@lang('views.task.form.labels')</label>
    </div>
    <div>
        <select multiple="multiple" name="labels[]" class="rounded border-gray-300 w-1/3 h-32" id="labels">
            <option selected="selected" value=""></option>
            <option value="1">ошибка</option>
            <option value="2">документация</option>
            <option value="3">дубликат</option>
            <option value="4">доработка</option></select>
    </div>
