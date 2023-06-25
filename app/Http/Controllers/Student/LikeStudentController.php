<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;

class LikeStudentController extends Controller
{
    public function index(Course $course)
    {
        $likes = $course->likesCount()->get();
        return response()->json([
            'likes' => $likes
        ]);
    }

    public function store(Course $course)
    {
        $student = Student::where('user_id', auth()->id())->first();
        $course->like($student, true);
        return response()->json([
            'message' => 'like added succfully'
        ]);
    }

    public function destroy(Course $course)
    {
        $student = Student::where('user_id', auth()->id())->first();
        $course->dislike($student);
        return response()->json([
            'message' => 'dislike added succfully'
        ]);
    }
}
