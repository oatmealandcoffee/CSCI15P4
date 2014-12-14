# Project: CSCI E-15 P4
**Philip Regan**

# Live URL
[http://p4.regan15.pw](http://p4.regan15.pw)

# Description
<!-- 2-3+ sentences -->

# Demo information
<!-- If you attend your section to do an in-person demo, make a note of this. If you opt to do the Jing screencast demo, include the link here .-->

# Test Requirements and Details
<!-- Any details the instructor or TA needs to know, for example, test credentials. -->

# Dependencies and Citations
<!--A list of any plugins, libraries, packages or outside code used in the project. See Student Responsibilities for more details on avoiding code plagiarism.-->
* Based on the Laravel framework
* PHP created and edited with [PHPStorm](http://www.jetbrains.com/phpstorm/).
* HTML and CSS created and edited with [BBEdit](http://www.barebones.com/products/bbedit/)
* Design created with [Bootstrap](http://www.bootstrap.org)
* Chess board provided with [chessboard.js](http://chessboardjs.com)
* Chess logic provided by [chess.js](https://github.com/jhlywa/chess.js)

# Project Notes

## Roadmap

	X Create project
		X Create master blade
		X download chess OSS Projects
	X Create chess demo page
	X Find positional database
	X Create databases
		X Establish connection
		X establish environment 
		X Create position table
		X Create user table
		* Create game table
	X Create User Functionality
		X Create Users DB Table
		X Create UserController as RESTful
		X Build credentialed access
	X Position CRUD
		X Update Position to RESTful Controller
			X Store new position
				X Get FEN from board to form element
			X Edit pre-existing position
			X Update pre-existing position
			X Delete position
		X Create GET
		X Create POST
		X Retrieve all GET
			X View -> Update
		X Retrieve {id} GET
		X Update {id} POST
			X Change position
			X Change title
			X New game
			X Delete position
		X Delete {id} POST
	X User CRUD
    	X Route::get('/user', 'UserController@index');
    	X Route::get('/user/create', 'UserController@create');
        X Route::post('/user', 'UserController@store');
        X Route::get('/user/{user_id}', 'UserController@show');
        X Add user not found redirect to create
        X Route::get('/user/{user_id}/edit', 'UserController@edit');
            X add form to edit
            X add pre-population of form
        X Route::put('/user/{user_id}', 'UserController@update');
            X add user not found redirect to create
        X Route::delete('/user/{user_id}', 'UserController@destroy'); 
            X add user not found redirect to create
	> Game CRUD
		X get /game/create - create SELECT OPPONENT
			- create autocomplete text field
				X white
				X black
				X position
		X post /game - store // redirect::action
		> get /game - index BY USER ONLY; DO NOT SHOW ALL GAMES
			X Add Game Info
				X White
				X Black
				X Move
				* Result
			* Add "Play" button
				* redirect to /game/{game_id}/edit
        X get /game/{game_id} - show($foo_id)
			X redirect to /game/{game_id}/edit
        > get /game/{game_id}/edit - edit($foo_id) PLAYER MOVE
        	> Add Game Info
        		X White
        		X Black
        		X Move
        		* Result
        	> Make board editable
        		> legal moves only
       		X Add "Submit Move" button
       			X redirect to put /game/{game_id}
        X put /game/{game_id} - update($foo_id)
        	* game/{game_id}/edit
        * delete /game/{game_id} - destroy($foo_id)
        	* redirect to /game
		- Game invitations: how to get two players to play a game
			- User name search
			- User name list
	X Deployment
		X Fix URLs
		X Migrate
			/ do not make tables beforehand; just use php artisan migrate
	* Clean up authorization handling
    > Validation
    	X User Create
    		X Unique username
    		X Unique email
    	X Position Create
        	X Unique Name
        	X Unique FEN
        X Position Edit
        	X Position not found
        	X Unique name
        	X Unique FEN
    	X Game delete (game index; admin only?)
    		X Game not found
    		- Update to opponent to winner
    	> Game Show
    		X Remove status
    		* Disable moving pieces once legal move is made
    		* Enable moving pieces when reset position button is pressed
    	> Buttons
    		X Align form buttons
    		X Fix button style
    			X Clear/Reset: class="btn btn-default" (white)
    			X Action: class="btn btn-primary" (blue)
    	* Login failure -> add flash messaging
    	* User Edit
    	    X User not found
    		*? Unique username
    		*? Unique email
    	* User Delete
    		X User not found
    		*? Update games to opponent winning
    	X User Index
    		X Do something with it
    	* Game Create
    		* User is white or black before submitting
    	* Game Edit
    		*! Game not found
    		* Highlight player's own side in addition to turn
    		* Move is different from server
    	* Error handling to home
	*? Enable backups on Digital Ocean Droplet
	X Credentialing
	X Footer navigation
		X login
		X account
		X games
		X positions
	- Game Play (core CRUD operations work; validation to come)
		* for the engine to know if a move is valid, it needs the state before and after the move
			X init engine with fen
			X if ( move valid v. engine)
				X prevent further moves
			X else
				X snapback
			X submit move
				X extract fen string
				X get turn from engine
		X init
			X create engine object
			X build valid, stateless fen
				/ [FEN] w KQkq - 0 1
				0 board fen
				1 player turn: {b, w}
				2 castle string {KQkq}
				3 e.p.: {-}
				4 half moves: {n >= 0}
				5 full moves: {n > 0}
    		/ pregan:mac, philipr:gmail
    		X Validate moves
    		X Switch board based on side (black side down if black)
        	X Init
        		X FEN
        		X player_id
        		X turn_id // id of the player whose turn it is
        	> Handle checking for turn manually, disable ajax pings
        	* if ( player_id == turn_id ) // it's the player's turn
        		* update board
        		* submit new position to server
        			* game ID
        			* board FEN
        			* player_id
        		* reload page
        	* if ( player_id != turn_id ) // opponent's turn
        		* 1/sec ajax ping server until new position received
        			* get fen from server -> Route::get('/game/{$game_id}/fen')
        			* verify login 
        			* verify game participation
        		* if ( board FEN != server FEN ) 
        			* update board
        			* set to player's turn

	* Foo CRUD
		* get /foo - index
		* get /foo/create - create
		* post /foo - store // redirect::action
		* get /foo/{foo_id} - show($foo_id)
		* get /foo/{foo_id}/edit - edit($foo_id)
		* put /foo/{foo_id} - update($foo_id) // redirect::action
		* delete /foo/{foo_id} - destroy($foo_id) // redirect::action
    
## Bugs
* [] User edit/store is not capturing and displaying errors
* [] Play button does not behave as expected in position show
	* Needs to take fen and init the game create interface
* [fixed] New games aren't editable by either player
* [fixed] FEN is not applied to board in position edit when there is an error
* [fixed] User's games do not appear in the user's game listing
* [fixed] User does not redirect correctly create->store->show
	* redirect to action as opposed to route
* [fixed] Position Edit page is not getting/using position data
* [fixed] Position index listing is incorrect after deleting a position
	* last positions come back as invalid

# Change History

* 14\_11\_14\_01\_00\_000: Started source
* 14\_11\_15\_01\_00\_001: Added chessboard.js, chess.js code
* 14\_11\_15\_01\_00\_002: Added test integration of example random v. random game code
* 14\_11\_15\_01\_00\_003: Added local database connection
* 14\_11\_15\_01\_01\_000: Added positions table with seed data
* 14\_11\_15\_01\_02\_000: Added positions retrieve all view and output
* 14\_11\_15\_01\_03\_000: Added positions retrieve one view and output; added navigation from positions retrieve all to positions retrieve one
* 14\_11\_15\_01\_03\_001: Added retrieval of individual position for editing
* 14\_11\_15\_01\_03\_002: Fixed bug with linking to chess engine js; Adding linking back to positions page
* 14\_11\_15\_01\_03\_003: Added buttons to position page
* 14\_11\_15\_02\_00\_000: Added users migration; added UserController, GameController, PositionController
* 14\_11\_15\_02\_01\_000: Added user_create form
* 14\_11\_15\_02\_01\_001: Added saving user data
* 14\_11\_15\_02\_02\_000: Added showing single user
* 14\_11\_15\_02\_02\_001: Fixed routing from create to store to show
* 14\_11\_15\_02\_03\_000: Added routing to editing and deleting
* 14\_11\_15\_02\_04\_000: Added user editing form
* 14\_11\_15\_02\_05\_000: Added user updating
* 14\_11\_15\_02\_06\_000: Added user deletion; added $user not found routing to index
* 14\_11\_29\_02\_07\_000: Added initial user authentication
* 14\_11\_29\_02\_08\_001: Started making positions RESTful; Added position index
* 14\_11\_29\_02\_08\_002: Fixed authentication issues around positions
* 14\_11\_29\_02\_08\_003: Added locking down of user-related urls
* 14\_11\_29\_02\_09\_000: Added position creation; Updated interface with minor tweaks 
* 14\_12\_01\_02\_09\_001: Added capture of position updates in position creation
* 14\_12\_01\_02\_09\_002: Added creation of positions to database
* 14\_12\_01\_02\_09\_003: Fixed bug where wrong value was being passed from position creation to show
* 14\_12\_01\_02\_09\_004: Added authentication to position creation
* 14\_12\_03\_02\_10\_000: Added edit page for positions; Added update for positions
* 14\_12\_03\_02\_11\_000: Added delete for positions
* 14\_12\_03\_02\_11\_001: Fixed edit page not getting position and name data; fixed routing for updates
* 14\_12\_03\_02\_11\_002: Fixed position index bug preventing position ids larger than number of rows in db table (no soft deletes. doh)
* 14\_12\_03\_02\_11\_003: Updated home page with better content
* 14\_12\_04\_03\_00\_000: Added game database migration; Added Game Index Blade; Added Game Index Code
* 14\_12\_04\_03\_01\_000: Added new game creation blade
* 14\_12\_04\_03\_01\_001: Added jquery autocomplete
* 14\_12\_04\_03\_01\_002: Deprecated jquery autocomplete; Added pull down menus for game creation
* 14\_12\_07\_03\_01\_003: Added username to user signup form
* 14\_12\_07\_03\_01\_004: Added link to user show page
* 14\_12\_07\_03\_01\_005: Added reset button to game create page
* 14\_12\_07\_03\_02\_000: Added game create; Added game show
* 14\_12\_07\_03\_02\_001: Fixed various bugs
* 14\_12\_08\_03\_02\_002: Fixed bug in game create form preventing data to be posted to server
* 14\_12\_08\_03\_03\_000: Added game creation in database
* 14\_12\_08\_03\_03\_001: Fixed bug where games were not being retrieved for a user on their games page
* 14\_12\_09\_03\_04\_000: Added game edit
* 14\_12\_11\_03\_04\_001: Updated game edit to submit FEN and submitting user ID; Fixed a layout bug
* 14\_12\_11\_03\_04\_002: Added game move submission round trip
* 14\_12\_11\_03\_04\_003: Updated to latest game turn components
* 14\_12\_11\_03\_04\_004: Added turn handling framework to game edit
* 14\_12\_11\_03\_05\_000: Added pinging framework
* 14\_12\_11\_03\_05\_001: Disabled ajax; Added move indicator
* 14\_12\_11\_03\_05\_002: Fixed bug where boards weren't editing
* 14\_12\_11\_03\_05\_003: Fixed bug where turns were not being completely swapped
* 14\_12\_14\_04\_00\_000: Added validation to user create form
* 14\_12\_14\_04\_00\_001: Updated user creation and edit forms to be aligned
* 14\_12\_14\_04\_00\_002: Updated user migration to include non-admin accounts
* 14\_12\_14\_04\_00\_003: Updated user update to manually handle username validation
* 14\_12\_14\_04\_01\_000: Updated img path in chessboard.js to align with Laravel URL map; Fixed bug in position edit where user id was not being grabbed
* 14\_12\_14\_04\_02\_000: Added validation to position create and edit
* 14\_12\_14\_04\_02\_001: Updated authorization in position edit; Remove extraneous code in position edit
* 14\_12\_14\_04\_03\_000: Updated authentication checks in GameController to be aligned
* 14\_12\_14\_04\_04\_000: Updated authentication checks in PositionController to be aligned
* 14\_12\_14\_04\_04\_001: Fixed authentication check in position show
* 14\_12\_14\_04\_05\_000: Updated authentication checks in UserController to be aligned
* 14\_12\_14\_04\_06\_000: Updated PositionController and UserController to better handle unfound objects
* 14\_12\_14\_04\_07\_000: Updated game edit form to be more organized; Updates game show code to better show intent; Fixed bug in game create preventing both players from submitting moves
* 14\_12\_14\_04\_07\_001: Updated game edit to change board orientation based on user login
* 14\_12\_14\_05\_00\_000: Starting enhanced game logic validating moves at time of play
* 14\_12\_14\_05\_01\_000: Added chess logic hooks
* 14\_12\_14\_05\_01\_001: Fixed parsing bugs preventing board drawing
* 14\_12\_14\_05\_02\_000: Fixed bug preventing board from being found in DOM which prevented game state lifecycle to complete
* 14\_12\_14\_05\_02\_000: Added game delete
* 14\_12\_14\_05\_03\_000: Updated buttons in position index to use bootstrap
* 14\_12\_14\_05\_04\_000: Updated buttons in all forms to use bootstrap
* 14\_12\_14\_05\_05\_000: Updated text areas in all forms to use bootstrap; Fixed a couple interface inconsistencies
* 14\_12\_14\_06\_00\_000: Updated layouts in all forms to make them consistent
* 14\_12\_14\_06\_00\_001: Updated interfaces in positions to make them consistent
* 14\_12\_14\_06\_00\_002: Updated button to make them consistent
* 14\_12\_14\_06\_01\_000: Updated game edit to prevent player from making more than one move

cd /Applications/MAMP/htdocs/CSCI15P4; git add --all; git commit -m "Updated game edit to prevent player from making more than one move"; git push origin master