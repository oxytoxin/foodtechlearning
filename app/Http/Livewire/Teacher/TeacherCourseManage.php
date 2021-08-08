<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use Livewire\Component;

class TeacherCourseManage extends Component
{
    public Course $course;

    public function render()
    {
        return view('livewire.teacher.teacher-course-manage',[
            'lessons' => $this->course->lessons()->latest()->get(),
        ]);
    }
}