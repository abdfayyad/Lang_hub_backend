<?php

namespace App\Http\Controllers\AcademyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthAcademyAdminController extends Controller
{
    public function register(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::query()->create([
            'role_id' => 2,
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
            //'password' => bcrypt($request->password)
        ]);

        $academy_admin = $user->academyAdmin()->create([
            'number' => $request->number,
        ]);

        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $user['token_type'] = 'Bearer';
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response,200);
    }
}
