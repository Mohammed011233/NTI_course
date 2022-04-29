<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

// Route::get('ToDo' , function(){
// return view('todo.tasks');
// });

Route::get('/ToDo' , [TodoController::class , 'index']);

Route::post('/ToDo/Store' , [TodoController::class , 'store']);

Route::get('/ToDo/delete/{id}' , [TodoController::class , 'destroy'])->middleware('checkDate');

Route::get('ToDo/register' , [authController::class , 'register']);

Route::post('user/insert' , [authController::class , 'insert_user']);

Route::get('ToDo/login' , [authController::class , 'login_page']);

Route::post('dologin' , [authController::class , 'login']);

Route::get('user/profile' , [authController::class , 'userData']);

Route::get('dologout' , [authController::class , 'logout']);

Route::get('destroy/{id}' , [authController::class , 'destroy']) ;
