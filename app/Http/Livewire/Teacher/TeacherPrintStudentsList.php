<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use Livewire\Component;

class TeacherPrintStudentsList extends Component
{

    public $course;

    public function render()
    {
        return view('livewire.teacher.teacher-print-students-list', [
            'students' => $this->course->students()->orderBy('last_name')->get()
        ])
            ->extends('layouts.base')
            ->section('body');
    }

    public function mount(Course $course)
    {
        abort_unless($course->user_id == auth()->id(), 403);
        $this->course = $course;
    }
}
