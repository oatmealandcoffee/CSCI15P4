<?php

class GameController extends \BaseController {

    const ID_WHITE = 0;
    const ID_BLACK = 0;

    const PLAY = -1;
    const WWIN = 0;
    const BWIN = 1;
    const DRAW = 2;

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

        $games = Game::where( 'white_id', '=', Auth::id() );

        return View::make('game_index')->with('games', $games);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if ( Auth::check() ) {

            // get the player names

            $users = User::all();

            // get the positions

            $positions = Position::all();

            return View::make('game_create')
                ->with( 'users', $users )
                ->with( 'positions', $positions);

        } else {
            return Redirect::guest('/');
        }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if ( Auth::check() ) {

            $s = new Game;

            // players

            /*
            $table->integer('white_id'); - white_player
            $table->integer('black_id'); - black_player
            */

            $s->white_id = User::where('username', '=', Input::get('white_player'))->first();
            $s->black_id = User::where('username', '=', Input::get('black_player'))->first();

            // fen

            /*
            $table->string('fen'); - opening_position
            */

            $s->fen = Input::get('opening_position');

            // remaining

            /*
            $table->integer('turn_id');
            $table->integer('result');
             */

            $s->turn_id = self::ID_WHITE;
            $s->result = self::PLAY;

            $s->save();

            // get the id

            $game = Game::where('id', '=', $s->id)->first();

            if (!$game) {
                return Redirect::action('GameController@index');
            }

            // redirect to /game/{game_id}

            return Redirect::action('GameController@show', array('$game_id' => $game->id));

        } else {
            return Redirect::guest('/');
        }

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($game_id)
	{
        if ( Auth::check() ) {

            if ( !is_numeric( $game_id ) || $game_id < 0 ) {
                return Redirect::to('/game');
            }

            $game = Game::find($game_id);

            if (!$game) {
                return Redirect::action('GameController@index');
            }

            return View::make('game_show')->with('game', $game);
        } else {
            return Redirect::guest('/');
        }
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
