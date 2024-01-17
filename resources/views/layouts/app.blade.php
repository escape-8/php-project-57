<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <header class="fixed w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="/" class="flex items-center">
                    <span
                        class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">@lang('layouts.app.name')</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @guest
                        <a href="{{ route('login') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            @lang('layouts.app.sign_in')
                        </a>
                        <a href="{{ route('register') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            @lang('layouts.app.sign_up')
                        </a>
                    @endguest
                    @auth
                        <a href="https://php-task-manager-ru.hexlet.app/logout"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            @lang('layouts.app.logout')
                        </a>
                        {{ Form::open(['url' => route('logout'), 'id' => 'logout-form', 'style' => 'display: none;']) }}
                        {{ Form::close() }}
                    @endauth
                </div>

                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="{{ route('tasks.index') }}"
                               class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                                @lang('layouts.app.tasks')</a>
                        </li>
                        <li>
                            <a href="{{ route('task_statuses.index') }}"
                               class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                                @lang('layouts.app.statuses')</a>
                        </li>
                        <li>
                            <a href="https://php-task-manager-ru.hexlet.app/labels"
                               class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                                @lang('layouts.app.labels')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
</div>
</body>
</html>
