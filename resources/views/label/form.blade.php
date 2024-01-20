    <div>
        {{ Form::label('name', __('views.label.form.name')) }}
    </div>
    <div class="mt-2">
        {{ Form::text('name', $label->name ?? null, ['class' => 'rounded border-gray-300 w-1/3', 'id' => 'name']) }}
    </div>
    @if ($errors->get('name'))
        @foreach ($errors->get('name') as $error)
            <div class="text-rose-600">{{ $error }}</div>
        @endforeach
    @endif
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
