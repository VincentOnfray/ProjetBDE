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



//Conditions générales de ventes
Route::get('/cgv', function () {
    return view('CGV.CGV');
});

//Mentions Légales
Route::get('/mentions', function () {
    return view('mentionslegales.Mentions');
});

Route::get('/ppdp', function () {
    return view('PPDP.PPDP');
});




// 
Route::get('/display_event', function () {
    return view('event.display');
});


// création d'event
Route::get('/create_event', 'EventController@create');
Route::post('/create_event', 'EventController@store');


Route::get('/display_idea', function () {
    return view('idea.display');
});

// routes de creation et de suppréssion d'idée
Route::get('/create_idea', 'IdeaController@create');
Route::post('/create_idea', 'IdeaController@store');
Route::post('/delete_idea', 'IdeaController@delete');
Route::post('/support_idea','IdeaController@support');


// route de création d'utilisateur
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');


//login
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');