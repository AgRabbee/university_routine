<?php

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

Auth::routes();

//Authentication area
Route::get('/signin','Auth\AuthController@signInForm');
Route::get('/signup','Auth\AuthController@signUpForm');
Route::post('/signin','Auth\AuthController@signIn');
Route::post('/signup','Auth\AuthController@signUp');


Route::get('/home', 'HomeController@index')->name('home');

//admin profile preview and updates
Route::get('/profile','HomeController@viewProfile');
Route::post('/profile','HomeController@updateProfile');
Route::post('/profile/changePassword','HomeController@updatePass');

//student profile preview and updates
Route::get('/student/profile','HomeController@viewStudentProfile');
Route::post('/student/profile','HomeController@updateProfile');
Route::post('/student/profile/changePassword','HomeController@updatePass');

// user preview and status updates
Route::get('/allUsers', 'UserController@allUsers');
Route::post('/new/user/active', 'UserController@user_active');
Route::post('/new/user/pause', 'UserController@user_pause');
Route::post('/new/user/deny', 'UserController@user_deny');

// subject preview and updates
Route::get('/allSubjects','ClassController@allSubjects');
Route::get('/addSubject','ClassController@addSubjectForm');
Route::post('/addSubject','ClassController@addSubject');
Route::get('/edit/subject/{id}','ClassController@editSubjectForm');
Route::post('/edit/subject/{id}','ClassController@editSubject');

// class times preview and updates
Route::get('/allClassTimes','ClassController@allClassTimes');
Route::get('/addClassTime','ClassController@addClassTimeForm');
Route::post('/addClassTime','ClassController@addClassTime');
Route::get('/edit/classTime/{id}','ClassController@editclassTimeForm');
Route::post('/edit/classTime/{id}','ClassController@editclassTime');
