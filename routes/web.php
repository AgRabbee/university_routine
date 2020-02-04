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

Route::get('/signin','Auth\AuthController@signInForm');
Route::get('/signup','Auth\AuthController@signUpForm');

Route::post('/signin','Auth\AuthController@signIn');
Route::post('/signup','Auth\AuthController@signUp');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile','HomeController@viewProfile');
Route::post('/profile','HomeController@updateProfile');
Route::post('/profile/changePassword','HomeController@updatePass');

Route::get('/student/profile','HomeController@viewStudentProfile');
Route::post('/student/profile','HomeController@updateProfile');
Route::post('/student/profile/changePassword','HomeController@updatePass');
