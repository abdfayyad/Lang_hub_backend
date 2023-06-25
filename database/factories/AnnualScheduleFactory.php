<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseSchedule>
 */
class AnnualScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $days = [
            'saturday', 'sunday', 'monday', 'tuesday',
            'wednesday', 'thursday'
        ];
        $start_times = [
            '12:00', '15:00', '18:00'
        ];
        $end_times = [
            '14:30', '17:30', '20:30'
        ];
        $indexH = random_int(0,2);
        return [
            'day' => $days[random_int(0,5)],
            'start_hour' => $start_times[$indexH],
            'end_hour' => $end_times[$indexH],
            'start_date'=> $this->faker->dateTimeThisMonth,
            'end_date'=> $this->faker->dateTimeThisMonth,
            'course_id' => rand(1, 10)
        ];
    }
}
