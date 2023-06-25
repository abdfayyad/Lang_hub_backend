<?php

namespace Database\Seeders;

use App\Models\TeacherSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacherSchedule = TeacherSchedule::factory()
        ->count(10) 
        ->create() ;
    }
}
