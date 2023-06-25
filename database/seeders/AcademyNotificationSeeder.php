<?php

namespace Database\Seeders;

use App\Models\Academy;
use App\Models\AcademyNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademyNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademyNotification::factory()
        ->count(10)
        ->create() ;
    }
}
