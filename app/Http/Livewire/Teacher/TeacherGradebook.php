<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Rollcall;
use App\Models\TaskType;
use Livewire\Component;

class TeacherGradebook extends Component
{
    public $course_id;

    public function render()
    {
        $course = Course::find($this->course_id);
        return view('livewire.teacher.teacher-gradebook', [
            'courses' => auth()->user()?->courses,
            'students' => $course?->students()->orderBy('last_name')->with(['submissions'])->withCount(['roll_calls as attendances_count' => function ($query) {
                $query->whereCourseId($this->course_id)->whereStatus(Rollcall::PRESENT);
            }])->get() ?? [],
            'tasks' => $course?->tasks->groupBy('task_type_id') ?? [],
            'school_days_count' => $course?->roll_calls()->distinct()->count(['date_taken'])
        ]);
    }

    public function mount()
    {
        if (request('course')) {
            $course = Course::find(request('course'));
            if ($course->user_id !== auth()->id()) {
                abort(403);
            }
            $this->course_id = $course->id;
        } else {
            $this->course_id = auth()->user()?->courses()->first()?->id;
        }
    }

    public function getbg($task_type)
    {
        return [
            'bg-gray-50',
            'bg-green-200',
            'bg-red-200',
            'bg-yellow-200',
            'bg-blue-200',
        ][$task_type];
    }
}
