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
//Route::get('login', function(){
//    return view('auth.login');
//});
//
//Route::get('register', function(){
//    return view('auth.register');
//});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::resource('contatori', 'ContatoriController');
    Route::resource('gruppiclifor', 'GruppiCliForController');
    Route::resource('aliquoteiva', 'AliquoteIvaController');
    Route::resource('clienti', 'ClientiController');
    Route::resource('fornitori', 'FornitoriController');
    Route::resource('contatti', 'ContattiController');
    Route::resource('destdiv', 'DestDivController');
    Route::resource('pagamenti', 'PagamentiController');
    Route::resource('vettori', 'VettoriController');
    Route::resource('unitamisura', 'UnitaMisuraController');
    Route::resource('tipologiespedizione', 'TipologieSpedizioneController');
    Route::resource('porti', 'PortiController');
    Route::resource('gruppiarticoli', 'GruppiArticoliController');
    Route::resource('causalitrasporto', 'CausaliTrasportoController');
    Route::resource('banche', 'BancheController');
    Route::resource('aspettobeni', 'AspettoBeniController');
    Route::get('scripts/elencoabicab', 'AbiCabController@elencojson');
    Route::resource('abicab', 'AbiCabController');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::auth();