<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Offer;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OfferNotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $offer = Offer::where('id' , random_int(1,10))->first();
       $student = Student::where('id' , random_int(1,10))->first();
        return [
            'title'=>$offer['name'],
            'offer_id'=>$offer['id'],
            'student_id' => $student['id'],
        ];
    }
}
