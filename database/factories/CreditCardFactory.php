<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
class CreditCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_number' => $this->faker->creditCardNumber(),
            'amount' => $this->faker->randomNumber(3),
            'student_id' => function() {
                return Student::factory()->create()->id;
            }
        ];
    }
}
