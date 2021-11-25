<div class="m-8 text-black"
     x-init="window.print()">
    <h1 class="my-4 text-center">
        Grades for {{ $course->code }}-{{ $course->name }}. Section: {{ $course->section_code }}
    </h1>
    <table class="min-w-full border-2 border-black divide-y divide-black">
        <thead class="">
            <tr>
                <th scope="col"
                    rowspan="2"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Name
                </th>
                @foreach ($tasks as $task_type => $task_type_tasks)
                    <th scope="col"
                        colspan="{{ $task_type_tasks->count() }}"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                        {{ Str::plural(\App\Models\TaskType::find($task_type)->name) }}
                    </th>
                @endforeach
                <th scope="col"
                    rowspan="2"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase ">
                    Attendance
                </th>
            </tr>
            <tr>

                @foreach ($tasks as $type_tasks)
                    @foreach ($type_tasks as $task)
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            {{ $loop->iteration }}
                        </th>
                    @endforeach
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr class="">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                        {{ $student->last_name }}, {{ $student->first_name }}
                    </td>
                    @foreach ($tasks->flatten() as $submission_task)
                        @php
                            $submission = $student->submissions->firstWhere('task_id', $submission_task->id);
                        @endphp
                        <td class="text-sm text-center text-gray-500 whitespace-nowrap">
                            {{ $submission ? ($submission->date_graded ? "$submission->score/{$submission->task->max_score}" : 'unchecked') : 'none' }}
                        </td>
                    @endforeach
                    <td class="text-sm text-center text-gray-500 whitespace-nowrap">
                        {{ $student->attendances_count }}/{{ $school_days_count }}
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

@section('page_title')
    Print Gradebook
@endsection

@section('title')
    Print Gradebook
@endsection
