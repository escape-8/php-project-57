@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            @include('flash::message')
            <div class="grid col-span-full">
                <h1 class="mb-5">@lang('views.task.index.list')</h1>
                <div class="w-full flex items-center">
                    <div>
                        <form method="GET" action="https://php-task-manager-ru.hexlet.app/tasks" accept-charset="UTF-8"
                              class="">
                            <div class="flex">
                                <div>
                                    <select class="rounded border-gray-300" name="filter[status_id]">
                                        <option selected="selected" value="">@lang('views.task.index.status')</option>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <select class="ml-2 rounded border-gray-300" name="filter[created_by_id]">
                                        <option selected="selected" value="">Автор</option>
                                        <option value="1">Михеева Яков Фёдорович</option>
                                        <option value="2">Силина Клементина Алексеевна</option>
                                        <option value="3">Лаврентий Иванович Максимов</option>
                                        <option value="4">Алиса Евгеньевна Воробьёваа</option>
                                        <option value="5">Артемий Максимович Овчинникова</option>
                                        <option value="6">Елизавета Максимовна Морозова</option>
                                        <option value="7">Прохор Борисович Осипова</option>
                                        <option value="8">Лихачёва Павел Владимирович</option>
                                        <option value="9">Ореховаа Зоя Фёдоровна</option>
                                        <option value="10">Нина Ивановна Логинова</option>
                                        <option value="11">Кабанова Марк Евгеньевич</option>
                                        <option value="12">Станислав Иванович Лыткина</option>
                                        <option value="13">Уваров Ян Львович</option>
                                        <option value="14">Никифоров Герасим Дмитриевич</option>
                                        <option value="15">Валерий Александрович Панфилов</option>
                                        <option value="16">e</option>
                                    </select>
                                </div>
                                <div>
                                    <select class="ml-2 rounded border-gray-300" name="filter[assigned_to_id]">
                                        <option selected="selected" value="">Исполнитель</option>
                                        <option value="1">Михеева Яков Фёдорович</option>
                                        <option value="2">Силина Клементина Алексеевна</option>
                                        <option value="3">Лаврентий Иванович Максимов</option>
                                        <option value="4">Алиса Евгеньевна Воробьёваа</option>
                                        <option value="5">Артемий Максимович Овчинникова</option>
                                        <option value="6">Елизавета Максимовна Морозова</option>
                                        <option value="7">Прохор Борисович Осипова</option>
                                        <option value="8">Лихачёва Павел Владимирович</option>
                                        <option value="9">Ореховаа Зоя Фёдоровна</option>
                                        <option value="10">Нина Ивановна Логинова</option>
                                        <option value="11">Кабанова Марк Евгеньевич</option>
                                        <option value="12">Станислав Иванович Лыткина</option>
                                        <option value="13">Уваров Ян Львович</option>
                                        <option value="14">Никифоров Герасим Дмитриевич</option>
                                        <option value="15">Валерий Александрович Панфилов</option>
                                        <option value="16">e</option>
                                    </select>
                                </div>
                                <div>
                                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2"
                                           type="submit" value="@lang('views.task.index.apply')">
                                </div>

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
