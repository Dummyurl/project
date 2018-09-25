<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
 Route::get('course','CourseController@course');
 Route::get('save_course/{data}','CourseController@save_course');
 Route::get('saved_course','CourseController@saved_course');