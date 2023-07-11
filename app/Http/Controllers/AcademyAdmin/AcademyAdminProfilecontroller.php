<?php

namespace App\Http\Controllers\AcademyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\AcademyAdminstrator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AcademyAdminProfilecontroller extends Controller
{
    public function show(){
        $admin = AcademyAdminstrator::where('user_id' , auth()->id())
        ->with('user')->first();
        return $admin ; 
    }
    public function update(Request $request){
        $validatedData = $request->validate([
	        'first_name' => 'nullable|string|max:255',
			'last_name'=>'nullable|max:20' ,
			'phone_number'=>'nullable',
			'photo'=> 'nullable|image' ,
	        // other fields to validate
	    ]);
        $admin = AcademyAdminstrator::where('user_id', auth()->id())->first();
    	$admin->update($validatedData);
    	return response()->json([
			'status'=>true ,
    		'message' => 'Profile updated successfully',
    		'student' => $admin
    	]);
    }
    public function changePassword(Request $request) {
        $admin = User::where('id', auth()->id())->first();
        // return $student ;
	    $validatedData = $request->validate([
	        'current_password' => 'required',
	        'new_password' => 'required|string|min:8'
	    ]);
	    if (!Hash::check($request->current_password, $admin->password)) {
	        return response()->json([
	        	'current_password' => 'The current password is incorrect',
	        ]);
	    }
	    $admin->update(['password' => Hash::make($validatedData['new_password'])]);
	    return response()->json([
	    	'success' => 'Password changed successfully'
	    ]);
	}
}
