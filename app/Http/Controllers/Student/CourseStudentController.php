<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use PhpParser\ErrorHandler\Collecting;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;

class CourseStudentController extends Controller
{
	public function index()
	{
	}
	//book a specific course
	public function bookCourse(Course $course)
	{
		$student = Student::where('user_id', auth()->id())->first();
		// Check if the course is full
		if ($course->seats <= 0) {
			return response()->json([
				'error' => 'The course is already full'
			]);
		}
		// Check if the student has already booked the course
		if ($student->courses()->where('course_id', $course->id)->exists()) {
			return response()->json([
				'error' => 'You have already booked this course!'
			]);
		}
		// Register the student for the course
		$student->courses()->attach($course->id);
		$course->seats -= 1;
		$course->save();

		return response()->json([
			'success' => 'You have successfully registered for the course!'
		]);
	}

	//show student enrolled courses
	public function enrolledCourses()
	{
		$student = Student::where('user_id', auth()->id())->first();
		$courses = $student->courses()
			->with('teachers')
			->get();
		return response()->json([
			'status' => 200,
			'message' => 'success',
			'data' => $courses
		]);
	}
	//Cancel a student's enrollment in a course
	public function cancelCourseEnrollment(Request $request, Course $course)
	{
		$student = Student::where('user_id', auth()->id())->first();
		$student->courses()->detach($course);
		return response()->json(['message' => 'Enrollment canceled']);
	}
	public function finishedCourses()
	{
		$student = Student::where('user_id', auth()->id())->first();
		$courses = $student->courses()
			->where('end_time', '<=', Date::now())
			->get();
		return response()->json([
			'status' => true,
			'message' => 'done successfully',
			'data' => $courses
		]);
	}
	public function solveExam(Request $request, Exam $exam)
	{
		$questions = $exam->questions()->get();
		$quesionMark = 100 / sizeof($questions);
		$collect = collect($request);
		return count($collect);

		$i = 1;
		$mark = 0;
		foreach ($questions as $q) {
			if ($request["$i"] == $q['correct_choise'])
				$mark += $quesionMark;
			$i++;
		}

		return $mark;
	}

}
