<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'exam_id'=> random_int(1,10),
            'value'=>$this->faker->sentence(3),
            'choise1'=>$this->faker->sentence(3),
            'choise2'=>$this->faker->sentence(3),
            'choise3'=>$this->faker->sentence(3),
            'choise4'=>$this->faker->sentence(3),
            'correct_choise'=>random_int(1,4)
        ];
    }
}
