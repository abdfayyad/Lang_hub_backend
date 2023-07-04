<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
           'first_name' => 'kassem' ,
           'last_name' => 'ghotani',
           'phone_number' => '0998085197',
           'photo' => 'sssssss',
           'user_id' => 1 
        ]);
        $students = Student::factory()->count(10)->create();

    }
}
