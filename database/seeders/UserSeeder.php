<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = User::create([
            'first_name' => 'Mark John Lerry',
            'last_name' => 'Casero',
            'email' => 'markjohnlerrycasero@sksu.edu.ph',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $teacher->roles()->attach(Role::find(1));
        $student = User::create([
            'first_name' => 'Johnrey',
            'last_name' => 'Naceda',
            'email' => 'johnreynaceda@sksu.edu.ph',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $student->roles()->attach(Role::find(2));

    }
}
