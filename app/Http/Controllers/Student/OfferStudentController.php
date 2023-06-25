<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\Offer;
use App\Models\OfferStudent;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OfferStudentController extends Controller
{
    public function index(){
        $student = Student::where('user_id' , auth()->id())->first() ;
        $offers = $student->offers()
        ->wherePivot('approved' , true)
        ->get() ;
        return response()->json([
            'status' => true ,
            'message' => 'done successfully',
            'data' => $offers 
        ]);
    }
    public function showOfferRequests(){
        $student_id = Student::where('user_id' , auth()->id())->first()['id'];
		$requests = OfferStudent::where('student_id' , $student_id)->get();
		$i = 0 ;
		foreach($requests as $request){
            $offer = Offer::where('id' , $request->offer_id)->first() ;
            $academyTime = $offer->academy()->first()['delete_time'] ;
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
    public function delete(Offer $offer){
        $student = Student::where('user_id' ,auth()->id())->first() ;
        $student->offers()->detach($offer);
        return response()->json([
            'status' => true ,
            'message' => 'delete it successfully'
        ]);
    }
}
