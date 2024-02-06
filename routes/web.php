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
Route::get('/course/delete/{id}', 'App\Http\Controllers\CourseController@delete')->name('course.delete');
Route::put('/course/update/{id}', 'App\Http\Controllers\CourseController@update')->name('course.update');
// Route::get('/course/edit/{id}', 'App\Http\Controllers\CourseController@edit')->name('course.update');

Route::get('/students', 'App\Http\Controllers\StudentController@index')->name('students');
// Route::get('/student/edit/{id}', function () {
//     return view('student-edit');
// });
Route::get('/student/delete/{id}', 'App\Http\Controllers\StudentController@delete')->name('student.delete');
Route::put('/student/update/{id}', 'App\Http\Controllers\StudentController@update')->name('student.update');
// Route::get('/student/edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('student.update');
Route::post('/students/create', 'App\Http\Controllers\StudentController@store')->name('student.store');
Route::get('/student/{id}', 'App\Http\Controllers\StudentController@show')->name('student.show');
Route::post('/student-has-course/create', 'App\Http\Controllers\StudentHasCourseController@store')->name('student-has-course.store');
