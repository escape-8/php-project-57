@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            @include('flash::message')
            <div class="grid col-span-full">
                <h1 class="mb-5">@lang('views.task_statuses.index.list')</h1>
                @auth
                    <div>
                        <a href="{{ route('task_statuses.create') }} "
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            @lang('views.task_statuses.index.create_status')</a>
                    </div>
                @endauth
                <table class="mt-4">
                    @if (count($taskStatuses) > 0)
                        <thead class="border-b-2 border-solid border-black text-left">
                        <tr>
                            <th>@lang('views.task_statuses.index.id')</th>
                            <th>@lang('views.task_statuses.index.name')</th>
                            <th>@lang('views.task_statuses.index.created_at')</th>
                            @auth
                                <th>@lang('views.task_statuses.index.actions')</th>
                            @endauth
                        </tr>
                        </thead>
                    @endif
                    <tbody>
                    @foreach($taskStatuses as $status)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->name }}</td>
                            <td>{{ $status->created_at }}</td>
                        @auth
                            <td>
                                <a data-method="delete" data-confirm="@lang('views.delete_confirm')" rel="nofollow"
                                   class="text-red-600 hover:text-red-900"
                                   href="{{ route('task_statuses.destroy', $status->id) }}">
                                    @lang('views.task_statuses.index.buttons.delete')
                                </a>
                                <a class="text-blue-600 hover:text-blue-900"
                                   href="{{ route('task_statuses.edit', $status->id) }}">
                                    @lang('views.task_statuses.index.buttons.edit')</a>
                            </td>
                        @endauth
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
