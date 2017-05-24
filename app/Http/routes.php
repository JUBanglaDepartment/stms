<?php

Route::get('/', function () {
    return view('user/loginPage');
});

Route::post('/login/attempt/',[
        'uses' => 'LoginController@loginAttempt',
        'as' => 'login.attempt',
]
);

Route::get('/dash', 'DashboardController@dashboard');

Route::get('/login', 'LoginController@loginPage');

Route::get('/take-courses', 'FacultyController@offeredCourses');
Route::post('/assign-course', 'FacultyController@assignOfferedCourses');

Route::get('/home', 'HomeController@index');
Route::resource('/user', 'UserController');
Route::resource('/program', 'ProgramController');
Route::resource('/course', 'CourseController');
Route::resource('/semester', 'SemesterController');
Route::resource('/faculty', 'FacultyController');
Route::resource('/student', 'StudentController');