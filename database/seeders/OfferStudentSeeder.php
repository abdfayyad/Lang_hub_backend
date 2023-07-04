<?php

namespace Database\Seeders;

use App\Models\OfferStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offer_student')->insert(
            [
                'offer_id' => 1 ,
                'student_id' => 1 ,
                'approved' => 1 
            ]);
        OfferStudent::factory()
        ->count(10)
        ->create();
    }
}
