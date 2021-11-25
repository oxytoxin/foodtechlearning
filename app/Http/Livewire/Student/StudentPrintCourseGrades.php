<?php

namespace App\Http\Livewire\Student;

use App\Models\Course;
use Livewire\Component;

class StudentPrintCourseGrades extends Component
{
    public $course;

    public function render()
    {
        return view('livewire.student.student-print-course-grades', [
            'tasks' => $this->course?->tasks->groupBy('task_type_id') ?? [],
            'submissions' => auth()->user()?->submissions,
        ])
            ->extends('layouts.base')
            ->section('body');
    }


    public function mount(Course $course)
    {
        abort_unless($course->students->has(auth()->id()), 403);
        $this->course = $course;
    }
}
