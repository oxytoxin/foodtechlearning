@section('page_title')
    View Course > {{ $course->name }}
@endsection

@section('title')
    Viewing {{ $course->code }}
@endsection

<div>
    <x-course-description :course="$course">
        <h3 class="title-sm">Instructor: {{ $course->teacher->name }}</h3>
        <h3 class="title-sm">{{ $lessons->count() }} lessons uploaded</h3>
    </x-course-description>
    <div class="mt-4">
        <ul class="grid-list">
            @forelse ($lessons as $lesson)
                <li class="col-span-1 border bg-white rounded-lg shadow divide-y divide-gray-200">
                    <div class="w-full flex items-center justify-between p-6 space-x-6">
                        <div class="flex-1 truncate">
                            <div class="flex items-center space-x-3">
                                <h3 class="text-gray-900 text-sm font-medium truncate">{{ $lesson->name }}</h3>
                                <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{ $lesson->getMedia()->count() }} attachments</span>
                            </div>
                            <p class="mt-1 text-gray-500 text-xs truncate">Date Created: {{ $lesson->readable_date_created }}</p>
                        </div>
                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{ uiavatar($lesson->name) }}" alt="">
                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="w-0 flex-1 flex">
                                <a href="{{ route('student.lesson.view', ['lesson' => $lesson]) }}" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <!-- Heroicon name: solid/phone -->
                                    <x-gmdi-table-chart-r class="text-gray-400"/>
                                    <span class="ml-3">View</span>
                                </a>
                            </div>
                            <div class="-ml-px w-0 flex-1 flex">
                                <a href="{{ route('download.attachments', ['lesson' => $lesson, 'editing' => true]) }}" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                    <!-- Heroicon name: solid/mail -->
                                    <x-gmdi-download-for-offline-r class="text-gray-400"/>
                                    <span class="ml-3 text-sm text-center">Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <h3 class="title col-span-4 my-10 md:text-2xl text-center">No lessons created for this course yet.</h3>
            @endforelse
        </ul>
    </div>
</div>
