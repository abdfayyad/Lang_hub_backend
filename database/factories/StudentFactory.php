<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Role;
use App\Models\Rate;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $studentRole = Role::where('name', 'Student')->first();
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber(),
            'photo'=> $this->faker->imageUrl ,
            'user_id' => function () use ($studentRole) {
                return User::factory()->create([
                    'role_id' => $studentRole->id,
                ])->id;
            }
        ];
    }
}
