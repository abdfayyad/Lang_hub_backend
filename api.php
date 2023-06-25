<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\AuthExpertController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//register user
Route::post('register/user',[AuthUserController::class,'register']);
Route::post('login/user',[AuthUserController::class,'login']);

//register expert
Route::post('register/expert',[AuthExpertController::class,'register']);
Route::post('login/expert',[AuthExpertController::class,'login']);

Route::post('password/email', ForgotPasswordController::class);
Route::post('password/code/check', ResetPasswordController::class);

Route::group(['prefix' => 'expert', 'middleware' => ['auth:sanctum']], function () {
    Route::post('add-experience', [ExpertController::class, 'store']);
    Route::post('add-schedule', [ExpertController::class, 'add_Schedule']);
    Route::get('show-schedule/{id}', [ExpertController::class, 'showDoctorSchedule']);
    Route::delete('remove-schedule/{id}', [ExpertController::class, 'deleteSchedule']);
    Route::get('approved-booking', [ExpertController::class, 'ApprovedHistory']);
    Route::get('logout', [AuthExpertController::class, 'logout']);
});

Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum']], function () {
    Route::get('show-categories', [UserController::class, 'showCategories']);
    Route::get('show-experts', [UserController::class, 'showExperts']);
    Route::get('show-expert-detail/{id}', [UserController::class, 'showExpertDetail']);
    Route::get('show-expert-name/{name}', [UserController::class, 'showByName']);
    Route::get('show-category-name/{name}', [UserController::class, 'showCategoryName']);
    Route::get('expert-category/{id}', [UserController::class, 'showExpertByCategoryId']);
    Route::post('book-expert/{id}', [UserController::class, 'book_expert']);
    Route::get('logout', [AuthUserController::class, 'logout']);
});
