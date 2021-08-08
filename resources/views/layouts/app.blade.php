@extends('layouts.base')

@section('body')
    @livewire('flash-toaster',[], key('toaster'))
    <div class="h-screen flex">
        <aside class="hidden md:block bg-primary-600 w-1/6">
            <a href="/" class="flex bg-white p-2 items-center h-20">
                <div class="h-full">
                    <img src="{{ asset('images/logo.gif') }}" class="h-full" alt="logo">
                </div>
                <h4 class="center flex-1 font-semibold h-full text-center uppercase text-2xl text-gray-600">FoodTech<br>Learning</h4>
            </a>
            @isset(auth()->user()->default_role)
                @switch(auth()->user()->default_role->name)
                    @case('teacher')
                    <x-teacher-sidebar/>
                    @break
                    @case('student')
                    <x-student-sidebar/>
                    @break
                @endswitch
            @endisset
        </aside>

        <div class="flex-1 flex overflow-hidden flex-col">
            <header class="bg-primary-500 flex items-center justify-between px-4 h-20">
                <nav class="text-white font-semibold flex items-center space-x-2">
                    <h2>
                        @yield('page_title')
                    </h2>
                </nav>
                <div>
                    <x-logout class="font-semibold text-white hover:text-gray-700" />
                </div>
            </header>
            <main class="flex-1 p-4 text-gray-900 bg-secondary-500 overflow-y-auto h-0">
                @yield('content')
                @isset($slot)
                    {{ $slot }}
                @endisset
            </main>
        </div>
    </div>
@endsection
