<?php

namespace Database\Factories;

use App\Models\Academy;
use App\Models\Teacher;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AcademyTeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'academy_id'=> rand(1, 10),
            'teacher_id' => rand(1, 10),
            'approved' => random_int(0,1) ==  1 ? true : false,
        ];
    }
}
