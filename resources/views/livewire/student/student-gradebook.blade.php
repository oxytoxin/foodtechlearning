@section('page_title')
    Student Gradebook
@endsection

@section('title')
    Gradebook
@endsection

<div>
    <div>
        <label class="block title-sm" for="courses">Course</label>
        <select wire:model="class" name="courses" id="courses">
            @forelse ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @empty
                <option value="null" disabled hidden selected>No classes available</option>
            @endforelse
        </select>

        <div class="mt-8">
            @forelse ($tasks as $task_type => $type_tasks)
                <h3 class="title uppercase">{{ Str::plural(\App\Models\TaskType::find($task_type)->name) }}</h3>

                    <div class="flex outline-primary flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 md:-mx-0">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 md:px-0">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Task Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Score
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Date Submitted
                                            </th>
                                            <th scope="col" class="px-6 text-center py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Date Graded
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($type_tasks as $task)
                                            @php
                                                $submission = $submissions->firstWhere('task_id', $task->id);
                                            @endphp
                                            @if ($submission)
                                                <tr class="bg-white">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $task->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                        {{ $submission->score }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                        {{ $submission->readable_date_submitted }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                        {{ $submission->readable_date_graded }}
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="bg-white">
                                                    <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $task->name }}
                                                    </td>
                                                    <td colspan="2" class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                                                        No submission
                                                    </td>
                                                </tr>
                                            @endif

                                        @empty
                                            <tr>
                                                <td colspan="4" class="title-sm text-center p-4">No tasks created for this course.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            @empty
            <h3 class="title text-2xl text-center p-4">No tasks created for this course.</h3>
            @endforelse
        </div>
    </div>
</div>
