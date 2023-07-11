<?php

namespace App\Http\Controllers\AcademyAdmin;

use App\Http\Controllers\Controller;
use App\Models\AcademyAdminstrator;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use PDO;

class AcademyAdminStudentController extends Controller
{
    public function index(){
        $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();        
        $teachers = $admin
        ->academy()
        ->first()
        ->students()
        ->wherePivot('approved' , 1)
        ->get();
        return response()->json([
            'status' => 200 ,
            'message' => 'done successfully',
            'data' => $teachers
        ]);
    }
    public function showStudentRequests(){
        $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
        $teachers = $admin
        ->academy()
        ->first()
        ->students()
        ->wherePivot('approved' , 0)
        ->get();
        return response()->json([
            'status' => 200 ,
            'message' => 'done successfully',
            'data' => $teachers
        ]);
    }
    public function acceptStudent(Student $student , Request $request){
        $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
        $academy = $admin->academy()->first();
        $academy->students()->updateExistingPivot($student->id , [
            'approved' => true 
        ]);
        
        return response()->json([
            'status' => 200 ,
            'message' => 'accepted successfully'
        ]);
    }
    public function rejectStudent(Student $student){
        $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
        $academy = $admin->academy()->first();
        $academy->students()->detach($student->id);
        return  response()->json([
            'status' => 200 ,
            'message' => 'deleted successfully'
        ]); 
    }
    public function addStudentToCourse(Course $course ,Student $student){
        $student->courses()->attach($course->id);
        return response()->json([
            'statuse' => 200 ,
            'message' =>  'added successfully ' 
        ]);
    }
}
