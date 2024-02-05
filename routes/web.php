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
// Route::get('/class', function () {
//     return view('class');
// });

Route::post('/course/create', 'App\Http\Controllers\CourseController@store')->name('course.store');
