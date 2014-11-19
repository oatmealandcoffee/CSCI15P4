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

Route::get('/login', function()
{
    return View::make('login');
});

/*
 * GAME ROUTES
 */

Route::get('/game/{id}', function ( $id ) {

    // if the id does not exist, then create a new game

    // if the id does exist, then retrieve the game

});

/*
 * POSITION ROUTES
 */

// Create position
Route::get('/position', function () {

});

// Create position
Route::post('/position/create/', function ( $id ) {

});

// Retrieve all positions
Route::get('/positions', function () {

    $positions = Position::all();

    return View::make('position_retrieve_all')->with('positions', $positions);
});

// Retrieve position {id} for updating and deleting
Route::get('/position/{id}', function ( $position_id ) {

    $positions = Position::all();

    if ( !is_numeric( $position_id ) || $position_id < 0 || $position_id > count( $positions ) ) {
        return Redirect::to('/positions');
    }

    $position = Position::find($position_id);

    return View::make('position_retrieve_one')->with('position', $position);



});

// Update position
Route::post('/position/update/{id}', function ( $id ) {

});

// Delete position
Route::post('/position/delete/{id}', function ( $id ) {

});

/*
 * TESTING ROUTES
 */

// testing for chess engine integration
Route::get('/randomchess', function()
{
    return View::make('randomchess');
});

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});