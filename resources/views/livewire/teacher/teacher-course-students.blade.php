@section('page_title')
    Manage Course Students > {{ $course->name }}
@endsection

@section('title')
    Managing Students
@endsection

<div class="flex flex-col h-full">
    <x-course-description :course="$course">
        <div>
            <h4 class="title-sm">No. of students: {{ $students->count() }}</h4>
        </div>
        <a target="blank"
           href="{{ route('teacher.print_students_list', ['course' => $course]) }}"
           class="button-primary">Print Students List</a>
    </x-course-description>
    <div class="p-4 my-4 outline-primary">
        <div class="flex flex-col flex-1 space-y-2 md:flex-row md:space-y-0 md:items-stretch md:space-x-2">
            <input wire:model.defer="email"
                   type="text"
                   placeholder="Student email address..."
                   class="@error('email'){{ 'error-outline' }}@enderror text-sm w-full">
            <button wire:click="enrol"
                    class="flex-shrink-0 text-sm button-primary">Enrol Student</button>
        </div>
        <x-error field="email"
                 class="error-xs" />
    </div>
    <div class="flex flex-col outline-primary">
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
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-center text-gray-500 uppercase">
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
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $student->email }}
                                    </td>
                                    <td class="flex justify-center px-6 py-4 space-x-4 text-sm font-medium text-right whitespace-nowrap">
                                        <button onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()"
                                                wire:click="unenroll({{ $student }})"
                                                class="text-indigo-600 underline hover:text-indigo-900 focus:outline-none">Unenroll</button>
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
    </div>


</div>
