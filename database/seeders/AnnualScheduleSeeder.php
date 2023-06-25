<?php

namespace Database\Seeders;

use App\Models\AnnualSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnualScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $annualSchedule = AnnualSchedule::factory()
        ->count(10)
        ->create();
    }
}
