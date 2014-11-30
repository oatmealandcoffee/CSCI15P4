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
		//
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
