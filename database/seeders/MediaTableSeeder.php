<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 04:38:59',
                'custom_properties' => '[]',
                'disk' => 'public',
                'file_name' => 'Screencast-from-07-18-2021-10:33:38-PM.webm',
                'generated_conversions' => '[]',
                'id' => 3,
                'manipulations' => '[]',
                'mime_type' => 'video/webm',
                'model_id' => 1,
                'model_type' => 'App\\Models\\Lesson',
                'name' => 'Screencast from 07-18-2021 10:33:38 PM.webm',
                'order_column' => 1,
                'responsive_images' => '[]',
                'size' => 281390,
                'updated_at' => '2021-08-05 04:38:59',
                'uuid' => 'e3f1a159-c243-4537-ab36-811cf62bf628',
            ),
            1 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 04:38:59',
                'custom_properties' => '[]',
                'disk' => 'public',
                'file_name' => 'laravel-tips-from-no-compromises-1.0.0.pdf',
                'generated_conversions' => '{"preview": true}',
                'id' => 4,
                'manipulations' => '[]',
                'mime_type' => 'application/pdf',
                'model_id' => 1,
                'model_type' => 'App\\Models\\Lesson',
                'name' => 'laravel-tips-from-no-compromises-1.0.0.pdf',
                'order_column' => 2,
                'responsive_images' => '[]',
                'size' => 1192651,
                'updated_at' => '2021-08-05 04:39:13',
                'uuid' => '6c28361e-1f2d-4781-92db-10046debc993',
            ),
            2 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 04:39:37',
                'custom_properties' => '[]',
                'disk' => 'public',
                'file_name' => 'latexsheet.pdf',
                'generated_conversions' => '{"preview": true}',
                'id' => 7,
                'manipulations' => '[]',
                'mime_type' => 'application/pdf',
                'model_id' => 2,
                'model_type' => 'App\\Models\\Lesson',
                'name' => 'latexsheet.pdf',
                'order_column' => 3,
                'responsive_images' => '[]',
                'size' => 299355,
                'updated_at' => '2021-08-05 04:39:39',
                'uuid' => '92f32084-2e0a-4fa7-bb61-e45c6d394ec9',
            ),
            3 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 04:39:37',
                'custom_properties' => '[]',
                'disk' => 'public',
                'file_name' => 'OJT-Guidelines_FINAL.pdf',
                'generated_conversions' => '{"preview": true}',
                'id' => 8,
                'manipulations' => '[]',
                'mime_type' => 'application/pdf',
                'model_id' => 2,
                'model_type' => 'App\\Models\\Lesson',
                'name' => 'OJT-Guidelines_FINAL.pdf',
                'order_column' => 4,
                'responsive_images' => '[]',
                'size' => 218648,
                'updated_at' => '2021-08-05 04:39:39',
                'uuid' => 'cbfcc23a-0ded-487b-b349-6ce0e4051757',
            ),
            4 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 05:26:17',
                'custom_properties' => '[]',
                'disk' => 'public',
                'file_name' => 'RD-ARTA-Form-02-_-Gradesheet.docx',
                'generated_conversions' => '[]',
                'id' => 10,
                'manipulations' => '[]',
                'mime_type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'model_id' => 2,
                'model_type' => 'App\\Models\\Lesson',
                'name' => 'RD-ARTA-Form-02-_-Gradesheet.docx',
                'order_column' => 5,
                'responsive_images' => '[]',
                'size' => 251680,
                'updated_at' => '2021-08-05 05:26:17',
                'uuid' => '442eee3f-a81d-45f4-879c-689342e4ba8f',
            ),
            5 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 05:28:23',
                'custom_properties' => '[]',
                'disk' => 'public',
                'file_name' => '2596.png',
                'generated_conversions' => '{"preview": true}',
                'id' => 13,
                'manipulations' => '[]',
                'mime_type' => 'image/png',
                'model_id' => 2,
                'model_type' => 'App\\Models\\Lesson',
                'name' => '2596.png',
                'order_column' => 6,
                'responsive_images' => '[]',
                'size' => 75345,
                'updated_at' => '2021-08-05 05:28:24',
                'uuid' => '6079ae45-154e-49f7-8c5c-041d8cf82303',
            ),
            6 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 05:28:23',
                'custom_properties' => '[]',
                'disk' => 'public',
                'file_name' => 'Screencast-from-07-18-2021-05:57:02-PM.webm',
                'generated_conversions' => '[]',
                'id' => 14,
                'manipulations' => '[]',
                'mime_type' => 'video/webm',
                'model_id' => 2,
                'model_type' => 'App\\Models\\Lesson',
                'name' => 'Screencast from 07-18-2021 05:57:02 PM.webm',
                'order_column' => 7,
                'responsive_images' => '[]',
                'size' => 1477288,
                'updated_at' => '2021-08-05 05:28:23',
                'uuid' => '7a910a58-745c-40e0-835b-9f7fee1c0e08',
            ),
            7 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 05:54:01',
                'custom_properties' => '{"identifier": 1628113853264251}',
                'disk' => 'public',
                'file_name' => 'latexsheet.pdf',
                'generated_conversions' => '[]',
                'id' => 15,
                'manipulations' => '[]',
                'mime_type' => 'application/pdf',
                'model_id' => 1,
                'model_type' => 'App\\Models\\Task',
                'name' => 'latexsheet.pdf',
                'order_column' => 8,
                'responsive_images' => '[]',
                'size' => 299355,
                'updated_at' => '2021-08-05 05:54:01',
                'uuid' => '5eea7e91-7667-4be6-9e74-aadda9766be0',
            ),
            8 => 
            array (
                'collection_name' => 'default',
                'conversions_disk' => 'public',
                'created_at' => '2021-08-05 06:54:13',
                'custom_properties' => '{"identifier": 1628113853264251}',
                'disk' => 'public',
                'file_name' => 'latexsheet.pdf',
                'generated_conversions' => '[]',
                'id' => 16,
                'manipulations' => '[]',
                'mime_type' => 'application/pdf',
                'model_id' => 3,
                'model_type' => 'App\\Models\\Submission',
                'name' => 'latexsheet.pdf',
                'order_column' => 9,
                'responsive_images' => '[]',
                'size' => 299355,
                'updated_at' => '2021-08-05 06:54:13',
                'uuid' => '4b627981-f02a-4230-a06b-7bb3e4c94de4',
            ),
        ));
        
        
    }
}