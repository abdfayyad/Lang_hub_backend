<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
class HomeController extends Controller
{
    public function test(Request $request, Course $course) {
        $marks = $request->marks;
        return $marks[0]['student_id'];
        
    }
}