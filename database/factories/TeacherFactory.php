<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Rate;
use App\Models\Academy;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $teacherRole = Role::where('name', 'Teacher')->first();
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'phone_number'=>random_int(100000 ,333333 ) ,
            'photo'=> $this->faker->imageUrl,
            'user_id' => function() use ($teacherRole) {
                return User::factory()->create([
                    'role_id' => $teacherRole->id
                ])->id;
            },   
        ];
    }
}
