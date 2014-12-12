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

            $s->turn_id = Input::get('white_player');
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

            return Redirect::action('GameController@edit', array('$game_id' => $game_id ));
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
	public function edit($game_id)
	{
        if ( Auth::check() ) {

            if ( !is_numeric( $game_id ) || $game_id < 0 ) {
                return Redirect::to('/game');
            }

            $game = Game::find($game_id);

            if (!$game) {
                return Redirect::action('GameController@index');
            }

            $white_player = User::find( $game->white_id );
            $black_player = User::find( $game->black_id );

            $white_username = $white_player->username;
            $black_username = $black_player->username;

            //return Pre::render(array ( 'game fen' => $game->fen, 'game id' => $game->id, 'game turn id' => $game->turn_id, 'id' => Auth::id(), 'white' => $white_username, 'black' => $black_username ) );

            return View::make('game_edit')
                ->with('game', $game)
                ->with('submitter_id', Auth::id() )
                ->with('white_username', $white_username)
                ->with('black_username', $black_username);
        } else {
            return Redirect::guest('/');
        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $game_id )
	{
        if ( Auth::check() ) {

            if ( !is_numeric( $game_id ) || $game_id < 0 ) {
                return Redirect::to('/game');
            }

            // get the game
            $game = Game::find( $game_id );

            // update the position
            $game->fen = Input::get('fen');

            // switch turns
            if ( $game->turn_id == $game->white_id ) {
                $game->turn_id == $game->black_id;
            } else {
                $game->turn_id == $game->white_id;
            }

            // save
            $game->save();

            return Redirect::action('GameController@edit', array('$game_id' => $game_id ));

        } else {
            return Redirect::guest('/');
        }
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
