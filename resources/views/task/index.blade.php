@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            @include('flash::message')
            <div class="grid col-span-full">
                <h1 class="mb-5">@lang('views.task.index.list')</h1>
                <div class="w-full flex items-center">
                    <div>
                        {{ Form::open(['url' => route('tasks.index'), 'method' => 'GET']) }}
                            <div class="flex">
                                <div>
{{--                                    {{ dump($filter['status_id']) }}--}}
                                    {{ Form::select('filter[status_id]',
                                      [null => __('views.task.index.status')] + $statuses->pluck('name', 'id')->toArray(),
                                      $filter['status_id'] ?? null,
                                      ['class' => 'rounded border-gray-300']) }}
                                    {{ Form::close() }}
                                </div>
                                <div>
                                    {{ Form::select('filter[created_by_id]',
                                        [null => __('views.task.index.author')] + $users->pluck('name', 'id')->toArray(),
                                        $filter['created_by_id'] ?? null,
                                        ['class' => 'ml-2 rounded border-gray-300']
                                        ) }}
                                    {{ Form::close() }}
                                </div>
                                <div>
                                    {{ Form::select('filter[assigned_to_id]',
                                        [null => __('views.task.index.executor')] + $users->pluck('name', 'id')->toArray(),
                                        $filter['assigned_to_id'] ?? null,
                                        ['class' => 'ml-2 rounded border-gray-300']
                                        ) }}
                                    {{ Form::close() }}
                                </div>
                                <div>
                                    {{ Form::submit(__('views.task.index.apply'),
                                       ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2']
                                       ) }}
                                </div>
                            {{ Form::close() }}
                            </div>
                        </form>
                    </div>
                    @auth
                    <div class="ml-auto">
                        <a href="{{ route('tasks.create') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            @lang('views.task.index.create_task')</a>
                    </div>
                    @endauth
                </div>
                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th>@lang('views.task.index.id')</th>
                        <th>@lang('views.task.index.status')</th>
                        <th>@lang('views.task.index.name')</th>
                        <th>@lang('views.task.index.author')</th>
                        <th>@lang('views.task.index.executor')</th>
                        <th>@lang('views.task.index.created_at')</th>
                        @auth
                        <th>@lang('views.task.index.actions')</th>
                        @endauth
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->status->name }}</td>
                            <td>
                                <a class="text-blue-600 hover:text-blue-900" href="{{ route('tasks.show', $task) }}">
                                    {{ $task->name }}</a>
                            </td>
                            <td>{{ $task->creator->name }}</td>
                            <td>{{ $task->assigned->name ?? '' }}</td>
                            <td>{{ $task->created_at->format('d.m.Y') }}</td>
                            @auth
                            <td>
                                @if (Auth::user()->can('tasks.destroy', $task))
                                <a data-confirm="@lang('views.delete_confirm')" data-method="delete"
                                   href="{{ route('tasks.destroy', $task) }}" class="text-red-600 hover:text-red-900">
                                    @lang('views.task.index.buttons.delete')</a>
                                @endif
                                <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:text-blue-900">
                                    @lang('views.task.index.buttons.edit')</a>
                            </td>
                            @endauth
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
