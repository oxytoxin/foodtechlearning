<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lessons')->delete();
        
        \DB::table('lessons')->insert(array (
            0 => 
            array (
                'course_id' => 1,
                'created_at' => '2021-08-05 04:38:11',
                'deleted_at' => NULL,
                'description' => 'This is the course orientation.',
                'id' => 1,
                'name' => 'Lesson 1',
                'updated_at' => '2021-08-05 04:38:11',
            ),
            1 => 
            array (
                'course_id' => 1,
                'created_at' => '2021-08-05 04:38:36',
                'deleted_at' => NULL,
                'description' => 'This is the refresher lesson.',
                'id' => 2,
                'name' => 'Lesson 2',
                'updated_at' => '2021-08-05 04:38:36',
            ),
        ));
        
        
    }
}