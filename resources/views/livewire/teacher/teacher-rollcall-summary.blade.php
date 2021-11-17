<div>

    <div>
        <div class="p-4 my-4 text-center bg-white">
            <h5 class="title-sm">Legend</h5>
            <ul class="flex flex-wrap justify-center space-x-2">
                <li>
                    <x-gmdi-check-circle-outline-r class="text-green-600" />PRESENT
                </li>
                <li>
                    <x-gmdi-add-circle-outline-r class="text-red-600 rotate-45" />ABSENT
                </li>
                <li>
                    <x-gmdi-remove-circle-outline-r class="text-yellow-600" />EXCUSED
                </li>
                <li>
                    <x-gmdi-change-circle-r class="text-yellow-900" />UNCHECKED
                </li>
            </ul>
            <h3 class="my-4 title">Attendance Summary for {{ $course->name }}({{ $course->section_code }}) <a class="text-sm font-semibold text-green-600 underline hover:text-green-700"
                   href="{{ route('teacher.course.roll_call', ['course' => $course]) }}">Back to Rollcall</a></h3>
        </div>

        <div class="flex flex-col outline-primary">
            <div class="-my-2 overflow-x-auto sm:-mx-6 md:-mx-0">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 md:px-0">
                    <div class="overflow-hidden border-b border-gray-200 shadow">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        rowspan="2"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Name
                                    </th>
                                    <th scope="col"
                                        colspan="{{ $roll_call_dates->count() }}"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-center uppercase bg-green-400">
                                        Date
                                    </th>
                                </tr>
                                <tr>
                                    @foreach ($roll_call_dates as $roll_call_date)
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            {{ Carbon\Carbon::parse($roll_call_date->date_taken)->format('m/d/y') }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $student->last_name }}, {{ $student->first_name }}
                                        </td>
                                        @foreach ($student->roll_calls as $roll_call)
                                            <td class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                @switch($roll_call?->status)
                                                    @case(1)
                                                        <x-gmdi-check-circle-outline-r class="text-green-600" />
                                                    @break
                                                    @case(2)
                                                        <x-gmdi-add-circle-outline-r class="text-red-600 rotate-45" />
                                                    @break
                                                    @case(3)
                                                        <x-gmdi-remove-circle-outline-r class="text-yellow-600" />
                                                    @break
                                                    @default
                                                        <x-gmdi-change-circle-r class="text-yellow-900" />

                                                @endswitch
                                            </td>
                                        @endforeach
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4"
                                                class="p-4 text-center title-sm">No students enrolled in this
                                                course.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('page_title')
        Teacher Gradebook
    @endsection

    @section('title')
        Gradebook
    @endsection
