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
		* result -> WWIN, BWIN, DRAW
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

URL Map

	/							GET		default
	/login						GET
	/login						POST
	/user						GET		create
	/user/{id}				GET		retrieve
	/user/{id}				POST	update
	/user/{id}				POST	delete
	/game						GET		create
	/game/{id}				GET		retrieve
	/game/{id}				POST	update, make move
	/game/edit/{id}			GET		update position
	/game/edit/{id}			POST	delete
	/position					GET		create
	/position/{id}			GET		retrieve
	/position/update/{id}		POST	update
	/position/delete/{id}		POST	delete
	/note/{id}				GET		retrieve
	/note/{id}				POST	update

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
		* Create user table (this might be coming from instructor)
		* Create game table
	> Position CRUD
		* Create GET
		* Create POST
		X Retrieve all GET
			* View -> Update
		* Retrieve {id} GET
		* Update {id} POST
			* Change position
			* Change title
			* New game
			* Delete position
		* Delete {id} POST
	* User CRUD
	* Game CRUD
	* Add navigation to the top of the master page
	* Migrate to production
	* Notes CRUD
	* Migrate to production
    
## Bugs
None known

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

cd /Applications/MAMP/htdocs/CSCI15P4; git add --all; git commit -m "Fixed bug with linking to chess engine js; Adding linking back to positions page"; git push origin master