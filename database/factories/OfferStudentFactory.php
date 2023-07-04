<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferStudent>
 */
class OfferStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'offer_id'=> rand(1, 10),
            'student_id'=> rand(1, 10),
            'approved'=>random_int(0,1)
        ];
    }
}
