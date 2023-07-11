<?php

namespace App\Http\Controllers\AcademyAdmin;

use App\Http\Controllers\Controller;
use App\Models\AcademyPhoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthAcademyController extends Controller
{
    public function register(Request $request) {
   
        $credentials = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'name' => 'required|string',
            'location' => 'required|string',
            'license_number' => 'required',
            'description' =>  'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required',
            'photo' => 'required|string'
        ]);
        
        $user = User::query()->create([
            'role_id' => 2,
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
            'email_verified_at' => now()
        ]);
         $admin = $user->academyAdmin()->create($request->all());
        $en = false;
        $fr = false; 
        $sp = false;
        $ge = false;
        if ($request->english == true) $en =true; 
        if ($request->french == true) $fr = true;
        if ($request->spanish == true) $sp =true;
        if ($request->germany == true) $ge = true;
        
        $pendigAcademy = $admin->AcademyPending()->create([
            'name' => $request->name,
            'location' => $request->location,
            'license_number' => $request->license_number,
            'description' =>  $request->description,
            'photo' => $request->photo,
            'english' => $en, 
            'french' => $fr,
            'spanish' => $sp,
            'germany' => $ge,
        ]);
        $photos = [] ;
        $i=0 ;
        foreach($request->photos as $photo){
            $photos[$i] = AcademyPhoto::create([
                'image' => $photo ,
                'academy_pending_id'=> $pendigAcademy->id
            ]);
        }
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $user['token_type'] = 'Bearer';
        $response = response()->json([
            'status'=>true,
            'massage' => 'registeration donr seccesfully',
            'data' => $admin,
            'token' => $token,
        ]);
        return $response;
    }
    //
}

