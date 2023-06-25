<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Student\RateController;
use App\Models\Academy;
use App\Models\Course;
use App\Models\Offer;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class GeneralController extends Controller
{
    public function academies(){
        $academies = Academy::all() ;
        return [
            'status' => true ,
            'message'=>'done seccussfuly',
            'data' => $academies
        ] ;
    }
    public function courseInAcademy(Academy $academy){
        $courses = $academy->courses()->get() ;
        return [
            'status'=> true ,
            'message' => 'dome seccussfully',
            'data'=> $courses  
        ] ;
    }
    public function courses(){
        $courses = 	Course::with('comments')->get();
		return response()->json([
			'states' => 200,
			'courses' => $courses
		]);
    }
    public function offers(){
        $offers = Offer::all() ;
        return [
            'status' => true ,
            'message' => 'done successfuly' ,
            'data' => $offers
        ];      
    }
    public function offer(Offer $offer){
        return response()->json([
            'status' => true ,
            'message' => 'done successfully' ,
            'data' => $offer 
        ]) ;
    }
    public function academy(Academy $academy){
        $rate = RateController::getAcademyRate($academy) ;
        $academy->load('students' , 'teachers' , 'photos' ,'offers'  ) ;
        $academy['rate'] = $rate ;
        return response()->json([
            'status' => true ,
            'message' => 'done successfully',
            'data' => $academy
        ]);
    }
    public function teacher(Teacher $teacher){
        $rate = RateController::getTeacherRate($teacher) ;
        $teacher['rate'] = $rate ;
        return response()->json([
            'status' => true ,
            'message' => 'don successfully',
            'data' => $teacher 
        ]);
    }

}





















