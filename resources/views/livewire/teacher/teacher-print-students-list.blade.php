<div class="m-8 text-black"
     x-init="window.print()">
    <h1 class="mt-4 text-center">
        Students List for {{ $course->code }}-{{ $course->name }}. Section: {{ $course->section_code }}
    </h1>
    <h3 class="mt-2 mb-4 text-sm font-semibold text-center">
        Students Total: {{ $students->count() }}
    </h3>
    <table class="min-w-full border-2 border-black divide-y divide-black">
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
