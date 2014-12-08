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

Essential Features
* User (TABLE)
	* Fields
		* id
		* email
		* username
		* password
		* timestamps
	* Create new account
	* Retrieve account information
	* Update account information -> AJAX
	* Delete (soft) account
* Game (TABLE)
	* Fields
		* id
		* white_user (id)
		* black_user (id)
		* position
		* player_turn
		* result -> PLAY, WWIN, BWIN, DRAW
		* timestamps
	* Create a game
		* Select an opponent
		* Select an opening position
		* Select White vs Black
	* Retrieve a game
	* Update a game -> AJAX
		* Submit a move
		* Ping for move
	* Delete (soft) a game
* Openings (TABLE)
	* Fields
		* id
		* timestamps
		* name
		* fen
		* player_turn
		* comments
	* preloaded
	
Bonus Features

* Game
	* Update a game
		* Edit the position (add/remove/move pieces without making a move)
* Openings (TABLE, req editing an already-existing position)
	* Create a position
	* Retrieve a position
	* Update a position -> AJAX
	* Delete (soft) a position
* Notes (TABLE)
	* id
	* user_id
	* game_id
	* content
	* timestamps

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
	> Game CRUD
		X get /game/create - create SELECT OPPONENT
			- create autocomplete text field
				X white
				X black
				X position
		X post /game - store // redirect::action
		> get /game - index BY USER ONLY; DO NOT SHOW ALL GAMES
        * get /game/{game_id} - show($foo_id)
        * get /game/{game_id}/edit - edit($foo_id) PLAYER MOVE
        * put /game/{game_id} - update($foo_id) // redirect::action
        * delete /game/{game_id} - destroy($foo_id) // redirect::action
		* Game invitations: how to get two players to play a game
			* User name search
			* User name list
	* User CRUD
			X Route::get('/user', 'UserController@index');
			> Route::get('/user/create', 'UserController@create');
				* add client-side user input validation
            	* add server-side user input validation
            X Route::post('/user', 'UserController@store');
            X Route::get('/user/{user_id}', 'UserController@show');
            X Add user not found redirect to create
            > Route::get('/user/{user_id}/edit', 'UserController@edit');
             	X add form to edit
             	X add pre-population of form
             	* add client-side user input validation
            	* add server-side user input validation
             > Route::put('/user/{user_id}', 'UserController@update');
             	X add user not found redirect to create
             X Route::delete('/user/{user_id}', 'UserController@destroy'); 
             	X add user not found redirect to create
    * User
    	* Landing page
    		* Redirect from login
            * Link in footer
    	* Deletion impact on game?
    		* Check if user exists. If not, then game throws an error
    	
	* Game
		* Landing page
		* Game (Position) State
			* Playable vs Win vs Draw
	* Add navigation to footer
	* Enable backups on Digital Ocean Droplet
	* Migrate to production
		/ do not make tables beforehand
		/ php artisan migrate
	X Credentialing?

	* Foo CRUD
		* get /foo - index
		* get /foo/create - create
		* post /foo - store // redirect::action
		* get /foo/{foo_id} - show($foo_id)
		* get /foo/{foo_id}/edit - edit($foo_id)
		* put /foo/{foo_id} - update($foo_id) // redirect::action
		* delete /foo/{foo_id} - destroy($foo_id) // redirect::action
    
## Bugs
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


cd /Applications/MAMP/htdocs/CSCI15P4; git add --all; git commit -m "Fixed bug where games were not being retrieved for a user on their games page"; git push origin master