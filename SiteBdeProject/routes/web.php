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

//Politique de Protection des Données Personnelles
Route::get('/ppdp', function () {
    return view('PPDP.PPDP');
});

//Page de contact
Route::post('/contact', "Mailcontroller@mail");

Route::get('/mailcontact', function () {
    return view('contact.mailcontact');
});


Route::get('/download_images','Controller@dl');



// event
Route::get('/create_event', 'EventController@create');
Route::post('/create_event', 'EventController@store');
Route::post('/delete_event', 'EventController@delete');
Route::post('/signUp_event','EventController@signUp');
Route::get('/display_event','EventController@display');



//images et commentaires
Route::post('/post_image','ImageController@store');
Route::post('/post_comment','CommentController@store');
Route::post('/like_image','ImageController@like');
Route::post('/delete_image','ImageController@delete');
Route::post('/delete_comment','CommentController@delete');



Route::get('/display_idea','IdeaController@display');

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

//logout
Route::get('/logout', 'SessionsController@destroy');


//shop
Route::get('/shop', 'BoutiqueController@getMain');
Route::get('/shop_all', 'BoutiqueController@getBoutique');
Route::get('/shop/{n}','BoutiqueController@getCategorie');
Route::get('/create_item','ItemController@create');
Route::post('/create_item','ItemController@store');
Route::post('/delete_item','ItemController@delete');
Route::post('/choose_item','ItemController@choose');

