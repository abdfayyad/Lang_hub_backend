<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CommentStudentController extends Controller
{
    
    public function index(Course $course)
    {
        $comments = $course->comments()->get();
        return response()->json([
            'comments' => $comments
        ]);
    }

    public function store(Request $request, Course $course)
    {
        $student = Student::where('user_id', auth()->id())->first();
        $validatedData = $request->validate([
            'body' => 'required|string'
        ]);

        $course->addComment($validatedData['body'], $student);
        return response()->json([
            'message' => 'comment added succfully'
        ]);
    }

    public function show(Comment $comment)
    {
        return response()->json([
            'comment' => $comment
        ]);
    }

    public function update(Request $request,  $id ,  $id2 )
    {
        $validatedData = $request->validate([
            'body' => 'required|string'
        ]);
        $comment = Comment::find($id2) ;
        $comment['body'] = $request->body;
        $comment->save() ;
        return response()->json([
            'message' => 'comment updated succfully'
        ]);
    }

    public function destroy( $i1 , $id)
    {
        $comment = Comment::find($id) ;
        $comment->delete();
        return response()->json([
            'message' => 'comment deleted succfully'
        ]);
    }
}
