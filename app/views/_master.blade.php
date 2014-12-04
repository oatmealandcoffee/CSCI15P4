@yield('require')

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>
        Laravel Chess::@yield('title')
    </title>

    <base href="http://localhost/" />

	<!-- BOOTSTRAP INCLUDE START -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- BOOTSTRAP INCLUDE END -->

	<!-- CHESS INCLUDE START -->

	<script src="http://localhost/js/chess.js"></script>
	<script src="http://localhost/js/chessboard-0.3.0.js"></script>
	<link rel="stylesheet" href="http://localhost/css/chessboard-0.3.0.css" />

	<!-- CHESS INCLUDE END -->

	<link rel="stylesheet" href="http://localhost/css/styles.css">

	@yield('head')

</head>

<body>



<div class="container">

	<header>
    	<h1>Laravel Chess Server</h1>
    </header>

    <hr>

    @yield('body')

    <hr>

    <footer>
    	<p>
    	@if(Auth::check())
            <a href='/logout'>Log out {{ Auth::user()->email; }}</a> | <a href="/position">Positions</a>
        @else
            <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
        @endif

    	</p>
        <p>Copyright &copy; 2014 Philip Regan. All Rights Reserved. All Wrongs Revenged.</p>
    </footer>
</div> <!-- /container -->

</body>
</html>