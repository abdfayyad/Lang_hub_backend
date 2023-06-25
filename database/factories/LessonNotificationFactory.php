<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LessonNotification>
 */
class LessonNotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $lesson = Lesson::where('id' , random_int(1,10))->first();
        return [
            'title'=>$lesson['name'],
            'lesson_id'=>$lesson['id'],
        ];
    }
}
