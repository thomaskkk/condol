<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::match('GET', 'login', 'LoginController@getLogin');
Route::match('POST', 'login', 'LoginController@postLogin');

Route::match('GET', 'register', 'LoginController@getRegister');
Route::match('POST', 'register', 'LoginController@postRegister');

Route::get('logoff', 'LoginController@logoff');

Route::match('GET', 'forgotpassword', 'LoginController@getRemind');
Route::match('POST', 'forgotpassword', 'LoginController@postRemind');

Route::match('GET', 'password/reset/{token}', 'LoginController@getReset');
Route::match('POST', 'password/reset', 'LoginController@postReset');


Route::group(array('before'=>'auth'), function() {

    Route::resource('moradores', 'MoradorController');

    Route::resource('users', 'UserController');
});





