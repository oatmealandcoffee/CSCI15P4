<?php

class GameController extends \BaseController {

    const PLAY = -1;
    const WWIN = 0;
    const BWIN = 1;
    const DRAW = 2;


    /*
     * Get the FEN string for a game
     */

    public function getFen($game_id) {

        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

        if ( !is_numeric( $game_id ) || $game_id < 0 ) {
            return Redirect::guest('/');
        }

        $game = Game::find($game_id);

        if ( !$game ) {
            Redirect::action('GameController@index');
        }

        return $game->fen;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

        $games = Game::where( 'white_id', '=', Auth::id() )
            ->orWhere( 'black_id', '=', Auth::id() )
                ->get();

        return View::make('game_index')->with('games', $games);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

            // get the player names

            $users = User::all();

            // get the positions

            $positions = Position::all();

            return View::make('game_create')
                ->with( 'users', $users )
                ->with( 'positions', $positions );

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }


        $error_str = '';

        if ( Input::get('white_player') != Auth::user()->username && Input::get('black_player') != Auth::user()->username ) {
            $error_str .= '<div class=\'error\'>You must be either white or black.</div>';
        }

        if ( $error_str != '' ) {
            return Redirect::action('GameController@create')->with('flash_message', $error_str );
        }

        $s = new Game;

            // players

            /*
            $table->integer('white_id'); - white_player
            $table->integer('black_id'); - black_player
            */

            $white_player = User::where('username', '=', Input::get('white_player'))->first();
            $s->white_id = $white_player->id;

            $black_player = User::where('username', '=', Input::get('black_player'))->first();
            $s->black_id = $black_player->id;

            // fen

            /*
            $table->string('fen'); - opening_position
            */

            $position = Position::where('name', '=', Input::get('opening_position'))->first();

            $s->fen = $position->fen;

            // remaining

            /*
            $table->integer('turn_id');
            $table->integer('result');
             */

            $s->turn_id = $white_player->id;
            $s->result = self::PLAY;

            $s->save();

            // get the id

            $game = Game::where('id', '=', $s->id)->first();

            if (!$game) {
                return Redirect::action('GameController@index');
            }

            // redirect to /game/{game_id}

            return Redirect::action('GameController@show', array('$game_id' => $game->id));

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($game_id)
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

        if ( !is_numeric( $game_id ) || $game_id < 0 ) {
            return Redirect::guest('/');
        }

        // there is little point in simply showing a game; if a user is
        // viewing it, then they are likely playing it
        return Redirect::action('GameController@edit', array('$game_id' => $game_id ));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($game_id)
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

            if ( !is_numeric( $game_id ) || $game_id < 0 ) {
                return Redirect::guest('/');
            }

            $game = Game::find($game_id);

            if (!$game) {
                return Redirect::action('GameController@index');
            }

            $white_player = User::find( $game->white_id );
            $black_player = User::find( $game->black_id );

            $white_username = $white_player->username;
            $black_username = $black_player->username;

            return View::make('game_edit')
                ->with('game', $game)
                ->with('submitter_id', Auth::id() )
                ->with('white_username', $white_username)
                ->with('black_username', $black_username)
                ->with('orientation', ( Auth::id() == $game->white_id ? 'white' : 'black') );

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $game_id )
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

        if ( !is_numeric( $game_id ) || $game_id < 0 ) {
            return Redirect::guest('/');
        }

            // get the game
            $game = Game::find( $game_id );

            // update the position
            $game->fen = Input::get('fen');

            // switch turns
            if ( $game->turn_id == $game->white_id ) {
                $game->turn_id = $game->black_id;
            } elseif ( $game->turn_id == $game->black_id ) {
                $game->turn_id = $game->white_id;
            }

            // save
            $game->save();

            return Redirect::action('GameController@edit', array('$game_id' => $game_id ));

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($game_id)
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

        if ( !is_numeric( $game_id ) || $game_id < 0 ) {
            return Redirect::guest('/');
        }

        // get the Game object
        $game = Game::where( 'id', '=', $game_id )->first();

        if ( $game ) {
            // delete the Game object
            $game->delete();
        }

        // redirect to the the game index page
        return Redirect::action('GameController@index');
	}


}
