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

	X Create project
		X Create master blade
		X download chess OSS Projects
	X Create chess demo page
	X Find positional database
	> Create databases
		> Establish connection
		> establish environment 
		* Create position table
		* Create user table (this might be coming from instructor)
		* Create game table
	* Position CRUD
	* User CRUD
	* Game CRUD
	* Migrate to production
	* Notes CRUD
	* Migrate to production

## Basic Openings
    Ruy Lopez	r1bqkbnr/pppp1ppp/2n5/1B2p3/4P3/5N2/PPPP1PPP/RNBQK2R b KQkq - 3 3
    Sicilian Defense	rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1
    Queen's Gambit	rnbqkbnr/ppp1pppp/8/3p4/2PP4/8/PP2PPPP/RNBQKBNR
    Alekhine Defense	rnbqkb1r/pppppppp/5n2/8/4P3/8/PPPP1PPP/RNBQKBNR
    Modern Defense	rnbqkbnr/pppppp1p/6p1/8/4P3/8/PPPP1PPP/RNBQKBNR
    King's Indian Defense	rnbqkb1r/pppppp1p/5np1/8/2PP4/8/PP2PPPP/RNBQKBNR
    King's Indian Attack	rnbqkbnr/ppp1pppp/8/3p4/8/5NP1/PPPPPP1P/RNBQKB1R
    English Opening	rnbqkbnr/pppppppp/8/8/2P5/8/PP1PPPPP/RNBQKBNR
    Dutch Defense	rnbqkbnr/ppppp1pp/8/5p2/3P4/8/PPP1PPPP/RNBQKBNR
    Dutch Stonewall	rnbqkbnr/ppp3pp/4p3/3p1p2/2PP4/2N5/PP2PPPP/R1BQKBNR
    
## Bugs
None known

# Change History

* 14\_11\_14\_01\_00\_000: Started source
* 14\_11\_15\_01\_00\_001: Added chessboard.js, chess.js code
* 14\_11\_15\_01\_00\_002: Added test integration of example random v. random game code
* 14\_11\_15\_01\_00\_003: Added local database connection

cd /Applications/MAMP/htdocs/CSCI15P4; git add --all; git commit -m "Added local database connection"; git push origin master