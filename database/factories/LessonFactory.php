<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),       
            'title1' => $this->faker->sentence(2),
            'title2' => $this->faker->sentence(2),
            'title3' => $this->faker->sentence(2),
            'title4' => $this->faker->sentence(2),
            'title5' => $this->faker->sentence(2),
            'title6' => $this->faker->sentence(2),
            'course_id' => rand(1, 10),
        ];
    }
}
