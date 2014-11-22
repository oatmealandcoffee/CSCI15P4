<?php

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

        return Redirect::action('UserController@show', array('user_id' => $user->id));
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
	public function edit($user_id)
	{
        $user = User::where('id', '=', $user_id)->first();
        return View::make('user_edit')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($user_id)
	{
        // get the user object
        $user = User::where('id', '=', $user_id)->first();

        // set the properties to the new values
        $new_username = Input::get('username');
        $new_email = Input::get('email');

        if ( $new_username != $user->username ) {
            $user->username = $new_username;
        }

        if ( $new_email != $user->email ) {
            $user->email = $new_email;
        }

        // save the user object
        $user->save();

        // redirect to the edit screen
        return Redirect::action('UserController@show', array('user_id' => $user_id));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($user_id)
	{
		echo 'DESTROY';
	}


}
