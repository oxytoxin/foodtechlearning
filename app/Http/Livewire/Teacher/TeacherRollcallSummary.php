<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Rollcall;
use Livewire\Component;

class TeacherRollcallSummary extends Component
{
    public Course $course;

    public function render()
    {
        return view('livewire.teacher.teacher-rollcall-summary', [
            'students' => $this->course?->students()->orderBy('last_name')->with(['submissions', 'roll_calls' => function ($query) {
                $query->where('course_id', $this->course->id);
            }])->get() ?? [],
            'roll_call_dates' => Rollcall::where('course_id', $this->course->id)->get()->unique('date_taken'),
        ]);
    }
}
