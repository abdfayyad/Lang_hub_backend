<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthTeacherController extends Controller
{
    public function register(Request $request) {
        $credentials = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string|unique:users,email',
            'phone_number' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:5'
        ]);

        $user = User::query()->create([
            'role_id' => 3,
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
            'email_verified_at' => now()
        ]);

        $teacher = $user->teachers()->create($request->all());

        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $user['token_type'] = 'Bearer';
        $response = [
            'teacher' => $teacher,
            'token' => $token,
            'role'=>'teacher'
        ];
        return response($response, 200);
    }
}
