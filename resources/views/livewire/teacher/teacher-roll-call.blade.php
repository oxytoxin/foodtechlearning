@section('page_title')
    Roll Call > {{ $course->name }} | {{ $course->section_code }}
@endsection

@section('title')
    Roll Call > {{ $course->code }}
@endsection

<div>
    <div>
        @if ($roll_call)
            <button wire:click="all_present"
                    class="bg-green-600 button-primary hover:bg-green-700">All Present</button>
            <button wire:click="reset_all"
                    class="button-danger">Reset</button>
        @else
            <button wire:loading.attr="disabled"
                    wire:click="create_roll_call"
                    class="bg-green-600 button-primary hover:bg-green-700">Create Roll Call</button>
        @endif
        <input type="date"
               name="current_date"
               id="current_date"
               wire:model="current_date"
               class="text-xs rounded">
    </div>
    @error('current_date')
        <h5 class="text-sm italic text-red-600">{{ $message }}</h5>
    @enderror
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
        <a href="{{ route('teacher.course.roll_call_summary', ['course' => $course]) }}"
           class="font-semibold text-green-600 underline hover:text-green-700">View Summary</a>
        @if ($current_date)
            <h4 class="mt-4 title">Class Attendance for {{ Carbon\Carbon::parse($current_date)->format('M d, Y') }}</h4>
        @endif
    </div>
    <div>
        @if ($roll_call)
            <div class="flex flex-col mt-4 outline-primary">
                <div class="-my-2 overflow-x-auto sm:-mx-6 md:-mx-0">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 md:px-0">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Last Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            First Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr class="bg-white">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $student->last_name }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $student->first_name }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-center text-gray-500 whitespace-nowrap">
                                                @switch($attendances->firstWhere('user_id', $student->id)?->status)
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
                                            <td class="flex justify-center px-6 py-4 space-x-4 text-sm font-medium text-right whitespace-nowrap">
                                                <button wire:click="present({{ $student->id }})"
                                                        class="text-green-600 underline hover:text-green-900 focus:outline-none">
                                                    <x-gmdi-check-circle-outline-r />
                                                </button>
                                                <button wire:click="absent({{ $student->id }})"
                                                        class="text-red-600 underline hover:text-red-900 focus:outline-none">
                                                    <x-gmdi-add-circle-outline-r class="rotate-45" />
                                                </button>
                                                <button wire:click="excused({{ $student->id }})"
                                                        class="text-yellow-600 underline hover:text-yellow-900 focus:outline-none">
                                                    <x-gmdi-remove-circle-outline-r />
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4"
                                                    class="p-4 text-center title-sm">No students enrolled in this course.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <h4 class="p-4 text-center title">No roll call created for this date.</h4>
            @endif
        </div>
    </div>
