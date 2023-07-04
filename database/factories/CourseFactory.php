<?php

namespace Database\Factories;

use App\Models\Academy;
use App\Models\Rate ;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $levels = [
            '0A', '0B', '1A', '1B', '2A', '2B', '3A', '3B',
            '4A', '4B', '5A', '5B', '6A', '6B'
        ];

        $levelKey = array_rand($levels);
        return [
            'name' => $levels[$levelKey],
            'price' => 180_000,
            'hours' => random_int(3,6),
            'course_image' => $this->faker->imageUrl,
            'seats' => $this->faker->numberBetween(8, 16),
            'description' => $this->faker->text(50),
            'active'=>random_int(0,1) == 1 ? true : false ,
            'start_time'=> $this->faker->dateTimeThisMonth,
            'end_time'=> $this->faker->dateTimeThisMonth,
            'academy_id' => rand(1, 10),
            'teacher_id' => rand(1, 10),
            'rate_id'=>function (){
                return Rate::create([
                    'rate'=>random_int(0,5) ,
                    'num_of_rates'=> 1
                ])->id;
            }
        ];
    }
}
