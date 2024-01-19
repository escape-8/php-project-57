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
        {{ Form::label('name', __('views.label.form.name')) }}
    </div>
    <div class="mt-2">
        {{ Form::text('name', $label->name ?? null, ['class' => 'rounded border-gray-300 w-1/3', 'id' => 'name']) }}
    </div>
    <div class="mt-2">
        {{ Form::label('description', __('views.label.form.description')) }}
    </div>
    <div class="mt-2">
        {{ Form::textarea('description',
                    $label->description ?? null,
                    ['class' => 'rounded border-gray-300 w-1/3 h-32',
                     'id' => 'name',
                     'cols' => 50,
                     'rows' => 10
                    ])
        }}
    </div>
