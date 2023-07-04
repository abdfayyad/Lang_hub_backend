<?php

namespace Database\Seeders;

use App\Models\AcademyStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademyStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academy_student')->insert([
            'academy_id' => 1,
            'student_id' => 1 ,
            'rate' => 0 
        ]);
        DB::table('academy_student')->insert([
            'academy_id' => 2,
            'student_id' => 1 ,
            'rate' => 0 
        ]);DB::table('academy_student')->insert([
            'academy_id' => 3,
            'student_id' => 1 ,
            'rate' => 0 
        ]);
        $academyStudent =  AcademyStudent::factory()
        ->count(10)
        ->create();
    }
}
