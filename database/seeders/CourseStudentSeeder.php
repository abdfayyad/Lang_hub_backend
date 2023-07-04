<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_student')->insert(
                [
                    'course_id' => 1 ,
                    'student_id' => 1 ,
                    'marks' => 50 
                ]);
        $course_student = CourseStudent::factory()
        ->count(20)
        ->create();
    }
}
