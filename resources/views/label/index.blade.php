@extends('layouts.app')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            @include('flash::message')
            <div class="grid col-span-full">
                <h1 class="mb-5">@lang('views.label.index.list')</h1>
                @auth
                <div>
                    <a href="{{ route('labels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        @lang('views.label.index.create_label')</a>
                </div>
                @endauth
                @if (count($labels) > 0)
                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                        <tr>
                            <th>@lang('views.label.index.id')</th>
                            <th>@lang('views.label.index.name')</th>
                            <th>@lang('views.label.index.description')</th>
                            <th>@lang('views.label.index.created_at')</th>
                            @auth
                            <th>@lang('views.label.index.actions')</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody><tr class="border-b border-dashed text-left">
                    @foreach($labels as $label)
                        <tr>
                            <td>{{ $label->id }}</td>
                            <td>{{ $label->name }}</td>
                            <td>{{ $label->description }}</td>
                            <td>{{ $label->created_at->format('d.m.Y') }}</td>
                            @auth
                            <td>
                                <a data-confirm="@lang('views.delete_confirm')"
                                   data-method="delete"
                                   class="text-red-600 hover:text-red-900"
                                   href="{{ route('labels.destroy', $label) }}">
                                    @lang('views.label.index.buttons.delete')</a>
                                <a class="text-blue-600 hover:text-blue-900"
                                   href="{{ route('labels.edit', $label) }}">
                                    @lang('views.label.index.buttons.edit')</a>
                            </td>
                            @endauth
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                <div class="mt-4">
                    {{ $labels->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
