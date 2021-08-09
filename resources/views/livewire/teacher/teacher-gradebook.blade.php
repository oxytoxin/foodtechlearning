<div>
     <div>
         <label class="block title-sm" for="courses">Course</label>
         <select wire:model="course" name="courses" id="courses">
            @forelse ($courses as $course)
                 <option value="{{ $course->id }}">{{ $course->name }}</option>
            @empty
                 <option value="null" disabled hidden selected>No courses available</option>
            @endforelse
         </select>
     </div>
    <div>
        <h3 class="title mt-4">Course Students</h3>
{{--        @dump($tasks)--}}
        <div class="flex outline-primary flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 md:-mx-0">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 md:px-0">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                </th>
                                @foreach ($tasks as $task_type => $task_type_tasks)
                                    <th scope="col" colspan="{{ $task_type_tasks->count() }}" class="px-6 {{ $this->getbg($task_type) }} text-center py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ Str::plural(\App\Models\TaskType::find($task_type)->name) }}
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                @foreach ($tasks as $type_tasks)
                                    @foreach ($type_tasks as $task)
                                        <th scope="col" class="px-6 text-center py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $loop->iteration }}
                                        </th>
                                    @endforeach
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($students as $student)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $student->last_name }}, {{ $student->first_name }}
                                    </td>
                                    @foreach ($tasks->flatten() as $submission_task)
                                        @php
                                            $submission = $student->submissions->firstWhere('task_id', $submission_task->id);
                                        @endphp
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                            {{ $submission ? ($submission->date_graded ? "$submission->score/{$submission->task->max_score}" : 'ungraded') : 'none' }}
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="title-sm text-center p-4">No students enrolled in this course.</td>
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
