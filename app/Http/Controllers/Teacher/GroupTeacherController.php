<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Group;
class GroupTeacherController extends Controller
{
    public function index() {
        $teacher = Teacher::where('user_id', auth()->id())->first();
        $groups = $teacher->groups()->get();
        return response()->json([
            'groups belongs to you' => $groups
        ]);
    }

    public function store(Request $request) {
        $teacher = Teacher::where('user_id', auth()->id())->first();
        $valdiatedData = $request->validate([
            'name' => 'required|string',
        ]);
        $group = $teacher->groups()->create($valdiatedData);
        return response()->json([
            'success' => 'group created succfully',
            'group' => $group
        ]);
    }
    public function show(Group $group) {
        return response()->json([
            'group' => $group
        ]);
    }
    public function update(Request $request, Group $group) {
        $valdiatedData = $request->validate([
            'name' => 'required|string',
        ]);
        $group->update($valdiatedData);
        return response()->json([
            'success' => 'group updated succfully',
            'group' => $group
        ]);
    }

    public function destroy(Group $group) {
        $group->delete();
        return response()->json([
            'sucess' => 'group deleted succfully'
        ]);
    }
}
