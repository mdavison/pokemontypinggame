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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'Pages\PokemonTypingGameController@index');
Route::get('/pokemon/typing-game/{pokemonIndex}', 'Pages\PokemonTypingGameController@show');

// Admin
Route::get('/admin/', 'Admin\AdminController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Email verification for new user registration
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegisterController@confirm'
]);

Route::get('/pokemon', 'PokemonController@index');
Route::post('/pokemon/user', 'PokemonController@storeUser');
Route::delete('/pokemon/user', 'PokemonController@removeUser');

// My Pokemon page
Route::get('/user/{user}/pokemon', 'UsersController@showPokemon');

// User Account
Route::post('/user/{user}/account/update', 'UsersController@update');
Route::delete('/user/{user}/account', 'UsersController@destroy');