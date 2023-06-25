<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Message;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class GroupStudentController extends Controller
{
    //get groups for student 
    public function index()
    {
        $student = Student::where('user_id', auth()->id())->first();
        $groups = $student->courses()
            ->with('groups')
            ->get();
        $data = [];
        $i = 0;
        foreach ($groups as $group) {
            if (count($group['groups']) !=  0) {
                $data[$i] = $group['groups'];
                $i++;
            }
        }
        return response()->json([
            'groups' => $data,
            'message' => 'succes',
        ]);
    }

    public function show(Group $group)
    {
        return $group;
    }

    public function leaveGroup(Group $group)
    {
        $student = Student::where('user_id', auth()->id())->first();
        $group->students()->detach($student->id);
        return response()->json([
            'success' => 'You left the group'
        ], 200);
    }

    public function sendMessage(Request $request, Group $group)
    {
        $valdiatedData = $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $student = Student::where('user_id', auth()->id())->first();
        $message = $group->messages()->create([
            'message' => $valdiatedData['message'],
            'student_id' => $student->id,
        ]);

        return response()->json([
            'success' => 'Message sent successfully!',
            'message' => $message
        ]);
    }

    public function showMessages(Group $group)
    {
        $messages = $group->messages()->get();
        return response()->json([
            'messages' => $messages
        ]);
    }

    public function deleteMessage(Message $message)
    {
        $student = Student::where('user_id', auth()->id())->first();
        if ($message->id === $student->id) {
            $message->delete();
            return response()->json([
                'success' => 'Message deleted successfully!'
            ]);
        }
    }
}
