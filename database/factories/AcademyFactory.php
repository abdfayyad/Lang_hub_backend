<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Rate;
use App\Models\AcademyAdminstrator;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Academy>
 */
class AcademyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(13),
            'location' => $this->faker->city,
            'image' => $this->faker->imageUrl,
            'license_number' => random_int(0,9999),
            'english'=>  random_int(0,1) == 1 ? true : false ,
            'french'=> random_int(0,1) == 1 ? true : false ,
            'spanish'=> random_int(0,1) == 1 ? true : false,
            'germany'=> random_int(0,1) == 1 ? true : false,
            'academy_adminstrator_id' => function (){
                return AcademyAdminstrator::factory()->create()->id;
            },
        ];
    }
}
