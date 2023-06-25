<?php

namespace Database\Seeders;

use App\Models\CourseStudent;
use Illuminate\Database\Seeder;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_student = CourseStudent::factory()
        ->count(20)
        ->create();
    }
}