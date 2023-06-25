<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Academy;
use App\Models\AcademyStudent;
use App\Models\Rate;
use App\Models\Course;
use App\Models\FeedBack;
use App\Models\RateTeacher;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class AcademyStudentController extends Controller
{
	public function index() {
		$student =  Student::where('user_id' , auth()->id())->first() ;
		$academies = $student->academies()
		->wherePivot('approved' , 1)
		->with('rate')
		->get() ;
		$respnose = response()->json([
			'status' => true ,
			'message' => 'academies displayed seccussfuly' ,
			'data' => $academies
		] );
		return $respnose ;
	}

	public function joinToAcademy(Request $request , Academy $academy){
		 $request->validate([
			'language' => 'nullable'
		]);

		$student = Student::where('user_id' , auth()->id())->first() ;
		if($student->academies()->wherePivot('academy_id' , $academy['id'])->wherePivot('approved',false)->exists()){
			return response()->json([
					'status'=>false  ,
					'message'=>'you are already add join request to this academy'
				]) ;
		}
		$student->academies()->attach($academy) ;
		$response = response()->json([
			'status'=> true ,
			'message'=>'done successfully',
		] );
		return $response ;

	}
	public function showRequest(){
		$student_id = Student::where('user_id' , auth()->id())->first()['id'];
		$requests = AcademyStudent::where('student_id' , $student_id)->get();
		$i = 0 ;
		foreach($requests as $request){
			$academyTime = Academy::where('id' , $request->academy_id)->first()['delet_time'] ;
			if (now()->greaterThan( $request['created_at']->addDays($academyTime))){
				$request->delete() ;
				unset($requests[$i]);
			}
			$i++ ;
		}
		return response()->json([
			'status' => true,
			'message'=>'done successfully',
			'data'=>$requests
		]);
	}
	public function delete(Academy $academy){
		$student = Student::where('user_id' , auth()->id())->first();
		$student->academies()->detach($academy) ;
		return response()->json([
			'status' => true ,
			'message' => 'deleted seccussfuly'
		]);
	}

	public function addFeedBack(Academy $academy , Request $request){

		$student_id = Student::where('user_id' , auth()->id())->first()['id'] ;
		$test = AcademyStudent::where('academy_id' , $academy->id)
		->where('student_id' ,$student_id)
		->where('approved' , 1 )
		->first();
		if ($test == null){
			return response()->json([
				'status'=>false ,
				'message'=> 'you are not member in this academy '
			]);
		}
			$data = $request->validate([
				'value' => 'required'
			]) ;
			$feedBack = FeedBack::create([
				'value' => $data['value'] ,
				'academy_id'=> $academy->id
			]) ;
			return response()->json([
				'status' => true ,
				'message' => 'done successfully',
				'data' => $feedBack
			]);

	}
	public function academySearch(Request $request){
        $key = $request->validate([
            'search_key' => 'required'
        ]);
        $academiesByName = Academy::where('name' , 'like' , "%$request->search_key%")
        ->get();
        $academiesByLocation = Academy::where('location' , 'like' , "%$request->search_key%")
        ->get();
        $academiesByLang = Academy::where( $request->search_key ,true)
        ->get();
        $responce = response()->json([
            'status'=>true,
            'message'=>'done successfully',
            'academiesByName' => $academiesByName,
            'academiesByLocation'=>$academiesByLocation,
            'academiesByLang'=>$academiesByLang
        ]);
    }
}
