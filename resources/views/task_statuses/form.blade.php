@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="flex flex-col">
    <div>
        {{ Form::label('name', __('views.task_statuses.form.name')) }}
    </div>
</div>
<div class="mt-2">
    {{ Form::text('name', $status->name ?? '', ['class' =>'rounded border-gray-300 w-1/3']) }}
</div>
