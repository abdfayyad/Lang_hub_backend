<?php

namespace Database\Seeders;

use App\Models\AcademyStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademyStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academyStudent =  AcademyStudent::factory()
        ->count(10)
        ->create();
    }
}
