<?php

namespace App\Http\Controllers\AcademyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\AcademyAdminstrator;
use App\Models\Course;
use Illuminate\Http\Request;

class AcademyAdminCourseController extends Controller
{
	protected function uploadCourseImage($request) {
		$courseImage = $request->file('course_image');
		$imageName = time().$courseImage->getClientOriginalName();
		$courseImage->move(public_path('course-images'), $courseImage);
		$imageUrl = "public/tourism/course-images/$imageName";
		return $imageUrl;
	}

    //AcademyAdmin can create courses
    public function store(Request $request) {
        $validatedData = $request->validate([
			'category_name'=> 'required',
	        'title' => 'required|string|max:255',
	        'description' => 'required|string',
            'price' => 'required|integer',
			'hours' => 'required|integer',
			'seats' => 'required|integer',
			'course_image' => 'required',
			'course_level' => 'required',
			'academy_id'=>'required'
	        // other fields to validate
	    ]);
		$imageUrl = '';
		if ($request->hasFile('course_image')) {
			$imageUrl = $this->uploadCourseImage($request);
		}
		
		
    	$course = Course::query()->create($validatedData + 
		['course_image' => $imageUrl]);

		// create a defualt group with this course
		$course->groups()->create([
			'name' => $validatedData['title']
		]);

    	return response()->json([
    		'success' => 'Course created successfully',
    		'course' => $course
    	]);
	}
    // update Course Information
	public function update(Request $request, Course $course) {
	    $validatedData = $request->validate([
	        'title' => 'required|string|max:255',
	        'description' => 'required|string',
            'price' => 'required|integer',
			'hours' => 'required|integer',
			'seats' => 'required|integer',
			'course_image' => 'required|image',
	        // other fields to validate
	    ]);
    	$course->update($validatedData);
		
    	return response()->json([
    		'success' => 'Course updated successfully',
    		'course' => $course
    	]);
	}

	public function addCourseSchedule(Request $request, Course $course) {
		$validatedData = $request->validate([
	        'day' => 'required|string',
			'start_time' => 'required|timezone',
			'end_time' => 'required|timezone',
			'date' => 'required|date'
	    ]);
		$schedule = $course->schedules()->create($validatedData);
		return response()->json([
			'message' => 'success',
			'status' => '200',
			'data' => $schedule,
		]);
	}
	///////////////
	public function inactiveCourses(){
        $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
        $academy = $admin->academy()->first();
		// return $academy ;
        $courses = $academy->courses()->where('active' , false)->get();
        return response()->json([
            'status' => 200 ,
            'message' => 'done successfully' ,
            'data' => $courses
        ]);
    }
	public function activeCourses(){
        $admin = AcademyAdminstrator::where('user_id' , auth()->id())->first();
        $academy = $admin->academy()->first();
		// return $academy ;
        $courses = $academy->courses()->where('active' , true)->get();
        return response()->json([
            'status' => 200 ,
            'message' => 'done successfully' ,
            'data' => $courses
        ]);
    }
}
