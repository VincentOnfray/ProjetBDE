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

// 
Route::get('/display_event', function () {
    return view('event.display');
});

// création d'event
Route::get('/create_event', 'EventController@create');
Route::post('/create_event', 'EventController@store');


// routes de creation d'idée
Route::get('/create_idea', 'IdeaController@create');
Route::post('/create_idea', 'IdeaController@store');


// route de création d'utilisateur
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');


//login
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');