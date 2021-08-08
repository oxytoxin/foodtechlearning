<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TaskTypeSeeder::class);
        $this->call(DummyUsersSeeder::class);
        $this->call(DummyCoursesSeeder::class);
        $this->call(DummyEnrolStudents::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(SubmissionsTableSeeder::class);
    }
}
