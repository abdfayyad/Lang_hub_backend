<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\AcademyStudent;
use App\Models\RateTeacher;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function rateTeacher(Request $request, Teacher $teacher) {
		$data = $request->validate([
            'rate' => 'required',
        ]) ;
		$student_id = Student::where('user_id' , auth()->id())->first()['id'] ;
		$previosRate = RateTeacher::where('student_id' , $student_id)
		->where('teacher_id' , $teacher->id)
		->first();
		if ($previosRate == null){
			return response()->json([
				'status' => 200 ,
				'message' => 'rating successfully',
				'data' => $this->createTeacherReta($request->rate , $teacher , $student_id) 
			]);
		}
		$previosRate['rate'] = $request->rate ;
		$previosRate->save();
		return response()->json([
			'status' => 200 ,
			'message' => 'rating successfully' ,
			'data' => $previosRate 
		]);
	}	
	public function createTeacherReta($rate , Teacher $teacher  , $student_id){
		$data = RateTeacher::create([
			'student_id' => $student_id ,
			'teacher_id' => $teacher->id,
			'rate' => $rate
		]);
		return $data ;
	}
    public function rateAcademy(Request $request , Academy $academy){
        $rate = $request->validate([
            'rate' => 'required'
        ]);
        $student_id = Student::where('user_id' , auth()->id())->first()['id'] ;
        $previosRate = AcademyStudent::where('student_id' , $student_id)
        ->where('academy_id' , $academy->id)
        ->where('approved' , true)
        ->first() ;
        if ($previosRate == null){
            return response()->json([
                'status' => false ,
                'message' => 'you should be member in this academy befor rate'
            ]) ;
        }
        $previosRate['rate'] = $request->rate ;
        $previosRate->save();
        return response()->json([
            'status' => 200 ,
            'message' => 'rating succssfully',
            'data' => $previosRate 
        ]);
    }
    public static function getTeacherRate(Teacher $teacher){
        $rates = RateTeacher::where('teacher_id' , $teacher->id)
        ->get();
        $numOfRates = 0 ;
        $sumOfRates = 0 ;
        foreach($rates as $rate){
            $sumOfRates += $rate->rate ;
            $numOfRates ++ ;
        }
        if ($numOfRates == 0 ) return 0.0 ;
        return (float) $sumOfRates / $numOfRates ;
    }
    public static function getAcademyRate(Academy $academy){
        $rates = AcademyStudent::where('academy_id' , $academy->id)->get();
        $numOfRates = 0 ;
        $sumOfRates = 0 ;
        foreach($rates as $rate){
            $sumOfRates += $rate->rate ;
            $numOfRates++;
        }
        if ($numOfRates == 0 ) return 0.0 ;
        return (float)$sumOfRates / $numOfRates ;
    }

}
