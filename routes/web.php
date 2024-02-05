<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/courses', 'App\Http\Controllers\CourseController@index');
Route::get('/course/{id}', 'App\Http\Controllers\CourseController@show')->name('course.show');
Route::post('/course/create', 'App\Http\Controllers\CourseController@store')->name('course.store');

Route::get('/students', 'App\Http\Controllers\StudentController@index');
// Route::get('/students', function () {
//     return view('students');
// });
// Route::get('/students/{id}', 'App\Http\Controllers\StudentsController@show')->name('students.show');
Route::post('/students/create', 'App\Http\Controllers\StudentController@store')->name('student.store');
