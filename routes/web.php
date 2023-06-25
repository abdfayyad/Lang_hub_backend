<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\zeen;
use App\Http\Controllers\MouazController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/h', function () {
    return 'welcome';
});

Route::view('essa','index');
Route::get('/h',[zeen::class,'dan']);
Route::post('/h/{id}',[zeen::class,'show']);

Route::get('/user', [zeen::class, 'checkUserName']);
Route::get('/capital', [zeen::class, 'capatilize']);
Route::get('/getpersons', [zeen::class, 'getPersons']);
Route::post('postproudect/{id}',[zeen::class,'creatProudect']);
Route::post('update/{id}',[zeen::class,'updateProductById']);