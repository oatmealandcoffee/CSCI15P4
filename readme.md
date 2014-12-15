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

	X Update footer menu to
		X Games
		X Positions
		X Account
		X Logout
	X User Index
		X Admin only
		X Link to User Delete
	X User Delete	
		X Admin only
		X Delete all played games

	* Foo CRUD
		* get /foo - index
		* get /foo/create - create
		* post /foo - store // redirect::action
		* get /foo/{foo_id} - show($foo_id)
		* get /foo/{foo_id}/edit - edit($foo_id)
		* put /foo/{foo_id} - update($foo_id) // redirect::action
		* delete /foo/{foo_id} - destroy($foo_id) // redirect::action
    
## Bugs
* [fixed] User edit/store is not capturing and displaying errors
* [fixed] User edit is not saving changes
* [fixed] Play button does not behave as expected in position show
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
* 14\_12\_14\_06\_01\_001: Updated position index to align link text with button
* 14\_12\_14\_06\_01\_002: Fixed routing issue in position edit; Updated user edit to recognize the submitter
* 14\_12\_14\_06\_02\_000: Updated UserController and PositionController to sanitize text fields
* 14\_12\_14\_06\_02\_001: Updated layout of position edit to make consistent
* 14\_12\_14\_06\_02\_002: Updated game create to check of user is one of players in the game
* 14\_12\_14\_06\_02\_003: Added flash messaging to login; Added style to have errors and alerts in read
* 14\_12\_15\_06\_03\_000: Added h2 tags to all pages for consistency; Updated "create" button in position create to primary class
* 14\_12\_15\_06\_04\_000: Added user admin, restricted access by account email

cd /Applications/MAMP/htdocs/CSCI15P4; git add --all; git commit -m "Added user admin, restricted access by account email"; git push origin master