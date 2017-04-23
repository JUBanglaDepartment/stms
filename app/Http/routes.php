<?php

Route::get('/', function () {
    return view('user/loginPage');
});


Route::get('/dash', 'DashboardController@dashboard');

Route::get('/login', 'LoginController@LoginPage');

Route::get('/offer-courses', 'SemesterController@offerCourses');
Route::get('/take-courses', 'FacultyController@offeredCourses');
Route::post('/assign-offered-course', 'SemesterController@assignOfferedCourses');

Route::get('/home', 'HomeController@index');
Route::resource('/user', 'UserController');
Route::resource('/program', 'ProgramController');
Route::resource('/course', 'CourseController');
Route::resource('/semester', 'SemesterController');
Route::resource('/faculty', 'FacultyController');
Route::resource('/student', 'StudentController');