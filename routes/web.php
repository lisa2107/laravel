<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
Route::get('student', [StudentController::class, 'index']);

Route::get('student/{student}/show', [StudentController::class, 'show']);
Route::get('student/{student}/edit', [StudentController::class, 'edit']);

Route::get('student/create',[StudentController::class,'create']);
Route::post('student/store',[StudentController::class,'store']);