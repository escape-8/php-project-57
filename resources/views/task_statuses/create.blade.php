@extends('layouts.app')

@section('content')
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            @auth
            <h1 class="mb-5">@lang('views.task_statuses.create.list')</h1>
            {{ Form::model($status, ['url' => route('task_statuses.store'), 'class' => 'w-50']) }}
                @include('task_statuses.form')
                <div class="mt-2">
                    {{ Form::submit(__('views.task_statuses.create.submit'), ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
                </div>
            {{ Form::close() }}
            @endauth
        </div>
    </div>
@endsection
