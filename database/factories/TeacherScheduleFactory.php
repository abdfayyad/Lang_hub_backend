<?php

namespace Database\Factories;

use App\Models\AcademyTeacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherSchedule>
 */
class TeacherScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $days = [
            'saturday', 'sunday', 'monday', 'tuesday',
            'wednesday', 'thursday'
        ];
        return [
            'day'=>$days[random_int(0,5)] ,
            'start_time'=> '2022-02-02',
            'end_time'=>'2022-02-02',
            'academy_teacher_id'=>function (){
                return AcademyTeacher::factory()->create()->id ;
            }
        ];
    }
}
