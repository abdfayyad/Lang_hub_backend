<?php

namespace App\Http\Controllers\AcademyAdmin;

use App\Http\Controllers\Controller;
use App\Models\AcademyAdminstrator;
use App\Models\Teacher;

use function PHPUnit\Framework\returnSelf;

class AcademyAdminTeacherController extends Controller
{
   public function showTeacherRequests(){
    $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
    $teachers = $admin
    ->academy()
    ->first()
    ->teachers()
    ->wherePivot('approved' , 0)
    ->get();
    return response()->json([
        'status' => 200 ,
        'message' => 'done successfully',
        'data' => $teachers
    ]);
   }
   public function index(){
    $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
    $teachers = $admin
    ->academy()
    ->first()
    ->teachers()
    ->wherePivot('approved' , 1)
    ->get();
    return response()->json([
        'status' => 200 ,
        'message' => 'done successfully',
        'data' => $teachers
    ]);
   }
   public function acceptTeacher(Teacher $teacher){
    $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
    $academy = $admin->academy()->first();
    $academy->teachers()->updateExistingPivot($teacher->id , [
        'approved' => true 
    ]);
    return response()->json([
        'status' => 200 ,
        'message' => 'added successfully'
    ]);
   }
   public function rejectTeacher(Teacher $teacher){
    $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
    $academy = $admin->academy()->first();
    $academy->teachers()->detach($teacher->id);
    return  response()->json([
        'status' => 200 ,
        'message' => 'deleted successfully'
    ]); 
   }
}