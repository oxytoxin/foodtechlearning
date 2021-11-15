<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Rollcall;
use App\Models\User;
use Livewire\Component;

class TeacherRollCall extends Component
{
    public Course $course;
    public $current_date;

    public function render()
    {
        if (!$this->current_date) {
            $this->current_date = null;
        }
        return view('livewire.teacher.teacher-roll-call', [
            'attendances' => Rollcall::whereDateTaken($this->current_date)->get(),
            'students' => $this->course->students,
            'roll_call' => Rollcall::where('course_id', $this->course->id)->whereDateTaken($this->current_date)->first(),
        ]);
    }

    public function mount()
    {
        $this->current_date = today()->format('Y-m-d');
    }

    public function create_roll_call()
    {
        $this->validate([
            'current_date' => 'required|date'
        ]);

        $roll_calls = collect();
        $now = now();
        foreach ($this->course->students as $key => $student) {
            $roll_calls->push([
                'user_id' => $student->id,
                'course_id' => $this->course->id,
                'date_taken' => $this->current_date,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        Rollcall::insert($roll_calls->toArray());
    }

    public function present(User $student)
    {
        Rollcall::updateOrCreate([
            'user_id' => $student->id,
            'course_id' => $this->course->id,
            'date_taken' => $this->current_date,

        ], [
            'status' => Rollcall::PRESENT
        ]);
    }

    public function absent(User $student)
    {
        Rollcall::updateOrCreate([
            'user_id' => $student->id,
            'course_id' => $this->course->id,
            'date_taken' => $this->current_date,

        ], [
            'status' => Rollcall::ABSENT
        ]);
    }

    public function excused(User $student)
    {
        Rollcall::updateOrCreate([
            'user_id' => $student->id,
            'course_id' => $this->course->id,
            'date_taken' => $this->current_date,
        ], [
            'status' => Rollcall::EXCUSED
        ]);
    }

    public function all_present()
    {
        Rollcall::where('course_id', $this->course->id)->update([
            'status' => Rollcall::PRESENT
        ]);
        $this->alert('success', 'All students present.');
    }

    public function getStatus($status)
    {
        return [
            1 => 'PRESENT',
            2 => 'ABSENT',
            3 => 'EXCUSED',
        ][$status] ?? 'UNCHECKED';
    }

    public function reset_all()
    {
        Rollcall::where('course_id', $this->course->id)->update([
            'status' => null
        ]);
        $this->alert('success', 'Roll call reset.');
    }
}
