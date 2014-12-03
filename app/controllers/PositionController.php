<?php

class PositionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if ( Auth::check() ) {
            $positions = Position::all();

            return View::make('position_index')->with('positions', $positions);
        } else {
            return Redirect::guest('/');
        }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if ( Auth::check() ) {
            return View::make('position_create');
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

            $s = new Position;
            $s->name = Input::get('name');
            $s->fen = Input::get('fen');
            $s->save();

            // get the id

            $position = Position::where('id', '=', $s->id)->first();

            if (!$position) {
                return Redirect::action('PositionController@index');
            }

            // redirect to /position/{position_id}

            return Redirect::action('PositionController@show', array('$position_id' => $position->id));

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
	public function show( $position_id )
	{
        if ( Auth::check() ) {

                $positions = Position::all();

                if ( !is_numeric( $position_id ) || $position_id < 0 || $position_id > count( $positions ) ) {
                    return Redirect::to('/position');
                }

                $position = Position::find($position_id);

                return View::make('position_show')->with('position', $position);
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
	public function edit( $position_id )
	{
        if ( Auth::check() ) {

            $positions = Position::all();

            if ( !is_numeric( $position_id ) || $position_id < 0 || $position_id > count( $positions ) ) {
                return Redirect::to('/position');
            }

            $position = Position::find($position_id);

            return View::make('position_edit')->with('position', $position);
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
	public function update( $position_id )
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

        // get the user object
        $position = Position::where('id', '=', $position_id)->first();

        if (!$position) {
            return Redirect::action('PositionController@index');
        }

        // set the properties to the new values
        $new_fen = Input::get('fen');
        $new_name = Input::get('name');

        if ( $new_fen != $position->fen ) {
            $position->fen = $new_fen;
        }

        if ( $new_name != $position->name ) {
            $position->name = $new_name;
        }

        // save the user object
        $position->save();

        // redirect to the edit screen
        return Redirect::action('PositionController@show', array('position' => $position));
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
