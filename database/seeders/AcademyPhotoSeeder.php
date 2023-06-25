<?php

namespace Database\Seeders;

use App\Models\AcademyPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademyPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academyPhoto = AcademyPhoto::factory()
        ->count(10)
        ->create();
    }
}
