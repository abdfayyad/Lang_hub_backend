<?php

namespace Database\Factories;

use App\Models\Academy;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademyNotification>
 */
class AcademyNotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $academy = Academy::where('id' , random_int(1,10))->first();
        $student = Student::where('id' , random_int(1,10))->first();
        return [
            'title'=>$academy['name'],
            'academy_id' => $academy['id'],
            'student_id' => $student['id'],
        ];
    }
}
