<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Rollcall;
use Livewire\Component;

class TeacherPrintGradebook extends Component
{
    public $course;

    public function render()
    {
        return view('livewire.teacher.teacher-print-gradebook', [
            'courses' => auth()->user()?->courses,
            'students' => $this->course?->students()->orderBy('last_name')->with(['submissions'])->withCount(['roll_calls as attendances_count' => function ($query) {
                $query->whereCourseId($this->course->id)->whereStatus(Rollcall::PRESENT);
            }])->get() ?? [],
            'tasks' => $this->course?->tasks->groupBy('task_type_id') ?? [],
            'school_days_count' => $this->course?->roll_calls()->distinct()->count(['date_taken'])
        ])->extends('layouts.base')->section('body');
    }

    public function mount(Course $course)
    {
        abort_unless($course->user_id == auth()->id(), 403);
        $this->course = $course;
    }
}
