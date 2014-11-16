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
		* name
		* position
		* player_turn
		* comments
		* timestamps
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

	/					GET		default
	/login				GET
	/login				POST
	/user				GET		create
	/user/{id}			GET		retrieve
	/user/{id}			POST	update
	/user/{id}			POST	delete
	/game				GET		create
	/game/{id}			GET		retrieve
	/game/{id}			POST	update, make move
	/game/edit/{id}		GET		update position
	/game/edit/{id}		POST	delete
	/position			GET		create
	/position/{id}		GET		retrieve
	/position/{id}		POST	update
	/note/{id}			GET		retrieve
	/note/{id}			POST	update

## Roadmap

	> Create project
		* Create master blade
		* download chess OSS Projects
	* Create chess demo page
	* Find positional database
	* Create database
		* Create user table (this might be coming from instructor)
		* Create game table
		* Create position table
	* User CRUD
	* Game CRUD
	* Position CRUD
	* Migrate to production
	* Notes CRUD
	* Migrate to production

## Bugs
None known

# Change History

* 14\_11\_14\_01\_00\_000: Started source
* 14\_11\_15\_01\_00\_001: Added chessboard.js, chess.js code

/Applications/MAMP/htdocs/CSCI15P4; git add --all; git commit -m "Added chessboard.js, chess.js code"; git push origin master