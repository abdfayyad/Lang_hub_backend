<?php

namespace Database\Factories;

use App\Models\Academy;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $levels = [
            '0A', '0B', '1A', '1B', '2A', '2B', '3A', '3B',
            '4A', '4B', '5A', '5B', '6A', '6B'
        ];
        return [
            'course_level'=>$levels[random_int(0,13)] ,
            'image'=>$this->faker->imageUrl ,
            'mark'=> random_int(60,100) ,
            'receive_date'=>'2022-02-02' ,
            'student_id'=> rand(1, 10),
            'academy_admin_id'=> rand(1, 10),
        ];
    }
}
