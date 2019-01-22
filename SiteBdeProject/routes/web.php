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
    return view('home');
});

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/display_event', function () {
    return view('event.display');
});

Route::get('/create_event', function () {
    return view('event.create');
});




Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');



Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');