<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class DummyEnrolStudents extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::get();
        foreach ($courses as $course){
            $students = User::inRandomOrder()->whereHas('roles', function (Builder $query){
                $query->whereRoleId(2);
            })->limit(10)->get();
            $course->students()->attach($students);
        }

    }
}
