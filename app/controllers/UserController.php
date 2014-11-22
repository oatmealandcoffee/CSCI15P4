<?php

/*
 - Route::get('/user', 'UserController@index');
 - Route::get('/user/create', 'UserController@create');
 > Route::post('/user', 'UserController@store');
 * Route::get('/user/{user_id}', 'UserController@show');
 * Route::get('/user/{user_id}/edit', 'UserController@edit');
 * Route::put('/user/{user_id}', 'UserController@update');
 * Route::delete('/user/{user_id}', 'UserController@destroy');
 */

class UserController extends \BaseController {

    use SoftDeletingTrait;

	/**
	 * Display a listing of the resource. $this->user->all();
	 *
	 * @return Response
	 */
	public function index()
	{
        return Redirect::route('user.create');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('user_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $s = new User;
        $s->username = Input::get('username');
        $s->email = Input::get('email');
        $s->password = Hash::make(Input::get('password'));
        $s->save();

        // get the id

        $user = User::where('email', '=', $s->email)->first();

        // redirect to /user/{user_id}

        return Redirect::route('user/'.$user->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user_id)
	{
        $user = User::where('id', '=', $user_id)->first();
        return View::make('user_show')->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
