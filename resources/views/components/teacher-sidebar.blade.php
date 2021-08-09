<article class="text-white">
    <ul class="font-semibold p-2 space-y-2 flex flex-col">
{{--        <a href="{{ route('teacher.dashboard') }}">--}}
{{--            <li class="hover:bg-secondary-500 hover:text-gray-900 rounded-md {{ !Str::contains(request()->route()->uri, 'dashboard') ?: 'text-gray-900 bg-secondary-500' }} p-4">--}}
{{--                <x-gmdi-dashboard-r /> Dashboard--}}
{{--            </li>--}}
{{--        </a>--}}
        <a href="{{ route('teacher.courses') }}">
            <li class="hover:bg-secondary-500 hover:text-gray-900 rounded-md {{ !Str::contains(request()->route()->uri, 'courses') ?: 'text-gray-900 bg-secondary-500' }} p-4">
                <x-gmdi-class-r /> Courses
            </li>
        </a>
        <a href="{{ route('teacher.gradebook') }}">
            <li class="hover:bg-secondary-500 hover:text-gray-900 rounded-md {{ !Str::contains(request()->route()->uri, 'gradebook') ?: 'text-gray-900 bg-secondary-500' }} p-4">
                <x-gmdi-table-chart-r /> Gradebook
            </li>
        </a>
    </ul>
</article>
