<?php

namespace Database\Seeders;

use App\Models\AcademyAdminstrator;
use App\Models\AcademyTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademyTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academyteacher = AcademyTeacher::factory()
        ->count(10)
        ->create();
    }
}
