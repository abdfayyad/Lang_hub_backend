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
        $start_times = [
            '9:00', '11:00', '13:00', '15:00', '17:00', '19:00', '20:00'
        ];
        $end_times = [
            '10:00', '12:00', '14:00', '16:00', '18:00', '21:00', '22:00'
        ];
        $startKey = array_rand($start_times);
        $endKey = array_rand($end_times);
        return [
            'saturday' => rand(1, 0),
            'start_saturday'=> $start_times[$startKey],
            'end_saturday'=> $end_times[$endKey],
            'sunday' => rand(1, 0),
            'start_sunday'=> $start_times[$startKey],
            'end_sunday'=> $end_times[$endKey],
            'monday' => rand(1, 0),
            'start_monday'=> $start_times[$startKey],
            'end_monday'=> $end_times[$endKey],
            'tuesday' => rand(1, 0),
            'start_tuesday'=> $start_times[$startKey],
            'end_tuesday'=> $end_times[$endKey],
            'wednsday' => rand(1, 0),
            'start_wednsday'=> $start_times[$startKey],
            'end_wednsday'=> $end_times[$endKey],
            'thursday' => rand(1, 0),
            'start_thursday'=> $start_times[$startKey],
            'end_thursday'=> $end_times[$endKey],
            'friday' => rand(1, 0),
            'start_friday'=> $start_times[$startKey],
            'end_friday'=> $end_times[$endKey],
            'academy_teacher_id'=>function (){
                return AcademyTeacher::factory()->create()->id ;
            }
        ];
    }
}
