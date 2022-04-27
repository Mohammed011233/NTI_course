<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\authController;
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

Route::get('blog/register' , [authController::class , 'register']);

Route::post('user/insert' , [authController::class , 'insert_user']);

Route::get('blog/login' , [authController::class , 'login_page']);

Route::post('dologin' , [authController::class , 'login']);

Route::get('user/profile' , [authController::class , 'userData']);

Route::get('dologout' , [authController::class , 'logout']);

Route::get('destroy/{id}' , [authController::class , 'destroy']);
// Route::get('blog/create',[blogController::class,'create']);
// Route::post('blog/store',[blogController::class,'store']);



