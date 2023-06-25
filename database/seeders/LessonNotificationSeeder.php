<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LessonNotification::factory()->count(10)->create();
    }
}
