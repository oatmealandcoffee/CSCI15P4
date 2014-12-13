<?php

class PositionController extends \BaseController {

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

            $positions = Position::all();

            return View::make('position_index')->with('positions', $positions);

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
            return View::make('position_create');

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

            # Step 1) Define the rules
            $rules = array(
                'name' => 'required|unique:positions,name',
                'fen' => 'required|unique:positions,fen'
            );
            # Step 2)
            $validator = Validator::make(Input::all(), $rules);

            # Step 3
            if($validator->fails()) {

                // build flash message
                $flash_message = '<p>Creation failed. Please fix the following errors:</p>';
                $messages = $validator->messages();
                foreach ($messages->all('<div class=\"error\">:message</div><br>') as $message)
                {
                    $flash_message .= $message;
                }

                return Redirect::to('/position/create')
                    ->with('flash_message', $flash_message)
                    ->withInput()
                    ->withErrors($validator);
            }

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
            return Redirect::guest('/');
        }

            $positions = Position::all();

            if ( !is_numeric( $position_id ) || $position_id < 0 ) {
                return Redirect::to('/position');
            }

            $position = Position::find($position_id);

            if (!$position) {
                return Redirect::action('PositionController@index');
            }

            return View::make('position_show')->with('position', $position);

    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $position_id )
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

        if ( !is_numeric( $position_id ) || $position_id < 0 ) {
            return Redirect::to('/position');
        }

        $position = Position::find($position_id);

        if (!$position) {
            return Redirect::action('PositionController@index');
        }

        return View::make('position_edit')->with('position', $position);
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

        # Step 1) Define the rules
        $rules = array(
            'name' => 'required|unique:positions,name',
            'fen' => 'required|unique:positions,fen'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);

        # Step 3
        if($validator->fails()) {

            // build flash message
            $flash_message = '<p>Editing failed. Please fix the following errors:</p>';
            $messages = $validator->messages();
            foreach ($messages->all('<div class=\"error\">:message</div><br>') as $message)
            {
                $flash_message .= $message;
            }

            return Redirect::to('/position/create')
                ->with('flash_message', $flash_message)
                ->withInput()
                ->withErrors($validator);
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
        return Redirect::to('/position/'.$position->id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy( $position_id )
	{
        if ( !Auth::check() ) {
            return Redirect::guest('/');
        }

        // get the Position object
        $position = Position::where( 'id', '=', $position_id )->first();

        if ( $position ) {
            // delete the position object
            $position->delete();
        }

        // redirect to the the new user page
        return Redirect::action('PositionController@index');
    }


}
