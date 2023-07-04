<?php

namespace Database\Factories;

use App\Models\Academy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str ;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $offers = [
            'Ielts Academic', 'Ielts General',
            'Tofel IBT', 'Tofel Junior', 'Tofel Primary',
            'Java', 'C++', 'Python', 'HTML', 'CSS'
        ];
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

        return [
            'name' => $offers[random_int(0, 9)],
            'price'=>50000,
            'hours'=>random_int(10,15),
            'start_date' => '2022-02-02',
            'end_date' => '2023-02-02',
            'description' => Str::random(15) ,
            'academy_id' => function(){
                return Academy::factory()->create()->id ;
            },
            'teacher_id' => rand(1,10) ,
        ];
    }
}
