<?php

namespace App\Http\Controllers\AcademyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AcademyAdminExamController extends Controller
{
    public function addExam(Course $course , Request $requests){
        if ($course->hasExam == true){
            return response()->json([
                'statuse' => 201,
                'message' => 'this course alrady has an exam'
            ]);
        }
        $exam = $course->exams()->create();
        $course->hasExam = true ;
        $course->save();
        for ($i=0 ; ;$i++){
            if ($requests[$i] == null)
            break ;
            $exam->questions()->create([
                'value' => $requests[$i]['value'],
                'choise1' => $requests[$i]['choise1'],
                'choise2' => $requests[$i]['choise2'],
                'choise3' => $requests[$i]['choise3'],
                'choise4' => $requests[$i]['choise4'],
                'correct_choise' => $requests[$i]['correct_choise']
            ]); 
        }
        $exam = $course->exams()->first();
        $questions = $exam->questions()->get();
        return response()->json([
            'statise' => 200 ,
            'message' => 'exam added successfully',
            'data' => $questions
        ]);
    }
    public function deleteExam(Course $course){
        if ($course->hasExam == false)
        return response()->json([
            'status' => 201, 
            'message' => 'thers is no exam in this course'
        ]);
        $course->hasExam = false ;
        $course->save();
        $exam = $course->exams()->first();
        $exam->delete();
        return response()->json([
            'status' => 200 ,
            'message' => 'deleted successfully'
        ]);
    }
}
