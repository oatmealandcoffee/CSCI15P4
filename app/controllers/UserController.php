<?php

class UserController extends \BaseController {

    use SoftDeletingTrait;

    /**
     * CONSTRUCTOR
     */
    public function __construct() {
        // Parent MUST be called
        parent::__construct();

        $this->beforeFilter('guest',
            array(
                'only' => array('getLogin','getSignup')
            ));
    }

    /**
     * Show the new user signup form
     *
     * @return View
     */
    public function getSignup() {
       if (!Auth::check()) {
           return View::make('user_signup');
       }
        return Redirect::route('/');
    }

    /**
     * Process the new user signup
     *
     * @return Redirect
     */
    public function postSignup() {

        # Step 1) Define the rules
        $rules = array(
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);

        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Sign up failed; please fix the errors listed below.')
                ->withInput()
                ->withErrors($validator);
        }

        $user = new User;

        $username = Input::get('username');
        // sanitize username
        $username = trim( $username );
        $username = stripslashes( $username );
        $username = htmlentities( $username );
        $user->username = $username;
        $user->email    = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        try {
            $user->save();
        }
        catch (Exception $e) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Sign up failed; please try again.')
                ->withInput();
        }
        # Log in
        Auth::login($user);
        return Redirect::to('/game');
    }

    /**
     * Display the login form
     *
     * @return View
     */
    public function getLogin() {
        if ( !Auth::check()) {
            return View::make('user_login');
        }
            return Redirect::route('/');
    }

    /**
     * Process the login form
     *
     * @return View
     */
    public function postLogin() {
        $credentials = Input::only('email', 'password');
        # Note we don't have to hash the password before attempting to auth - Auth::attempt will take care of that for us
        if (Auth::attempt($credentials, $remember = false)) {
            return Redirect::intended('/game');
        }
        else {
            return Redirect::to('/login')
                ->with('flash_message', 'Log in failed; please try again.')
                ->withInput();
        }
    }

    /**
     * Logout
     *
     * @return Redirect
     */
    public function getLogout() {
        # Log out
        Auth::logout();
        # Send them to the homepage
        return Redirect::to('/');
    }

    /**
     * RESTful Routing
     */

    /**
	 * Display a listing of the resource. $this->user->all();
	 *
	 * @return Response
	 */
	public function index()
	{


        // only admins can see all users; stupidly simplistic admin account handling
        if ( Auth::user()->email != 'admin@regan15.pw' ) {
            return Redirect::guest('/');
        }

        $users = User::whereNotIn('id', array( Auth::user()->id ) )->get();

        return View::make('user_index')->with('users', $users);
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
        // sanitize username
        $username = Input::get('username');
        $username = trim( $username );
        $username = stripslashes( $username );
        $username = htmlentities( $username );
        $s->username = $username;
        $s->email = Input::get('email');
        $s->password = Hash::make(Input::get('password'));
        $s->save();

        // get the id

        $user = User::where('email', '=', $s->email)->first();

        if (!$user) {
            return Redirect::action('UserController@index');
        }

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

        if ( !is_numeric( $user_id ) || $user_id < 0 ) {
            return Redirect::guest('/');
        }

        if ( !Auth::check() || $user_id != Auth::id() ) {
            return Redirect::guest('/');
        }

        $user = User::where('id', '=', $user_id)->first();

        if (!$user) {
            return Redirect::action('UserController@index');
        }

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
        if ( !is_numeric( $user_id ) || $user_id < 0 ) {
            return Redirect::guest('/');
        }

        if ( !Auth::check() || $user_id != Auth::id() ) {
            return Redirect::guest('/');
        }

        $user = User::where('id', '=', $user_id)->first();

        if (!$user) {
            return Redirect::action('UserController@index');
        }

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

        if ( !is_numeric( $user_id ) || $user_id < 0 ) {
            return Redirect::guest('/');
        }

        if ( !Auth::check() || $user_id != Auth::id() ) {
            return Redirect::guest('/');
        }

        $new_username = Input::get('username');
        $new_username = trim( $new_username );
        $new_username = stripslashes( $new_username );
        $new_username = htmlentities( $new_username );
        $new_email = Input::get('email');
        $new_password = Input::get('password');

        $user = User::where('id', '=', $user_id)->first();

        // nothing changed
        if ( $new_username == $user->username && $new_email == $user->email && $new_password == '') {
            return Redirect::action('UserController@edit', array('user_id' => $user_id))->with('flash_message', '<div class=\'error\'>No changes found.</div>');
        }

        // check the password first

        if ( $new_username == $user->username && $new_email == $user->email && $new_password != '' ) {

            # Step 1) Define the rules
            $rules = array(
                'password' => 'required|min:6'
            );
            # Step 2)
            $validator = Validator::make(Input::all(), $rules);

            # Step 3
            if($validator->fails()) {
                return Redirect::action('UserController@edit', array('user_id' => $user_id))->with('flash_message', '<div class=\'error\'>The password must be at least 6 characters.</div>' );
            }
        }

        /*
         * The supplied validator does not meet needs here. Either the username
         * or the email could be the same as the submitting user
         *
         * if ( user found with property )
         *      if ( found user is not submitting user )
         *          throw an error
         *      end if
         * end if
         *
         * if ( error thrown )
         *      return to edit with flash message
         * end if
         */

        $user_by_name = User::where('username', '=', $new_username)->first();
        $user_by_email = User::where('email', '=', $new_email)->first();

        $error_str = '';

        if ( $user_by_name && $user_by_name->id != Auth::user()->id ) {
            $error_str .= '<div class=\'error\'>The username has already been taken.</div>';
        }

        if ( $user_by_email && $user_by_email->id != Auth::user()->id ) {
            $error_str .= '<div class=\'error\'>The email has already been taken.</div>';
        }

        if ( $error_str != '' ) {
            return Redirect::action('UserController@edit', array('user_id' => $user_id))->with('flash_message', $error_str );
        }


        if (!$user) {
            return Redirect::action('UserController@index');
        }

        // set the properties to the new values


        if ( $new_username != $user->username ) {
            $user->username = $new_username;
        }

        if ( $new_email != $user->email ) {
            $user->email = $new_email;
        }

        if ( $new_password != '' ) {
            $user->password = Hash::make(Input::get('password'));
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

        if ( !is_numeric( $user_id ) || $user_id < 0 ) {
            return Redirect::guest('/');
        }

        // only admins can destroy users; stupidly simplistic admin account handling
        if ( Auth::user()->email != 'admin@regan15.pw' ) {
            return Redirect::guest('/');
        }

        // get the user object
        $user = User::where('id', '=', $user_id)->first();

        if (!$user) {
            return Redirect::action('UserController@index');
        }

        // delete the user's games

        $games = Game::where( 'white_id', '=', $user->id )
            ->orWhere( 'black_id', '=', $user->id )
            ->get();

        if ($games) {
            foreach( $games as $game ) {
                $game->delete();
            }
        }

        // delete the user object
        $user->delete();

        // redirect to the index page
        return Redirect::action('UserController@index');
	}


}
