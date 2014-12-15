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

Route::get('/', function()
{
	return View::make('index');
});

/*
 * User Routes
 */

// REST
Route::resource('user', 'UserController');

// Explicit to clean up user URLs
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );

/*
 * POSITION ROUTES
 */

Route::resource('position', 'PositionController');

/*
 * GAME ROUTES
 */

Route::resource('game', 'GameController');

/*
 * ERROR CAPTURE
 */
App::error(function($exception, $code) {
    return View::make('index');
});