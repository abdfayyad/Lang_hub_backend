<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Teacher;
class LessonTeacherController extends Controller
{
    public function index(Course $course) {
        $teacher = Teacher::where('user_id', auth()->id())->first();

        $lessons = $course->lessons()->with('teachers') ->get();
        return response()->json([
            'lessons' => $lessons
        ]);
    }
    public function addLesson(Request $request, Course $course) {
        // Retrieve the teacher associated with the course
        
    }

    public function showComments(Lesson $lesson) {
        $comments = $lesson->comments()->with('user')->get();
        return response()->json([
            'lesson' => $lesson,
            'comments' => $comments
        ]);
    }

    public function publish(Lesson $lesson) {
        $course = $lesson->course();
        $lesson->published = true;
        $lesson->save();
        return response()->json([
            'success', 'Lesson published successfully!'
        ]);
    }
}
