<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shreddit</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
	.count {
		margin-bottom: 0px;
	}
	.vote-score {
		font-size: 30px;
		margin-bottom: 0;
	}
	.vote {
		opacity: .3
	}
	.vote.active {
		opacity: 1;
	}
	.vote:hover {
		opacity: 1;
	}
	.glyphicon-plus-sign {
		color: green;
	}
	.glyphicon-minus-sign {
		color: red;
	}
	/*404 style*/
	.error-msg {
		position: absolute;
		border: 5px double black;
		background-color: black;
		color: red;
		height: 100%;
	}
	.glow {
		position: absolute;
		top: 50%;
		left: 35%;
		height: 200px;
		width: 200px;
		background-color: white;
		animation: box .5s linear infinite;
	}
	@keyframes box {
		0% { opacity: .5; background-color: red;  }
		20% {opacity: 1; background-color: lightblue; }
		50% { opacity: 1; background-color: coral;  }
		70% { opacity: .5; background-color: darkblue; }
		100% { opacity: .2; background-color: orange; }
	}
	/*------*/
	.navbar-brand { 
		position: relative; 
		z-index: 2; 
	}
	.navbar-nav.navbar-right .btn { 
		position: relative;
		z-index: 2;
		padding: 4px 20px;
		margin: 10px auto; 
	}
	.navbar .navbar-collapse { 
		position: relative; 
	}
	.navbar .navbar-collapse .navbar-right > li:last-child { 
		padding-left: 22px;
	}
	.navbar .nav-collapse { 
		position: absolute;
		z-index: 1; 
		top: 0; 
		left: 0; 
		right: 0; 
		bottom: 0; 
		margin: 0; 
		padding-right: 120px; 
		padding-left: 80px; 
		width: 100%; 
	}
	.navbar.navbar-default .nav-collapse { 
		background-color: lightblue; 
	}
	.navbar.navbar-inverse .nav-collapse { 
		background-color: lightblue; 
	}
	.navbar .nav-collapse .navbar-form { 
		border-width: 0; 
		box-shadow: none; 
	}
	.nav-collapse>li { 
		float: right; 
	}
	.btn.btn-circle { 
		border-radius: 50px; 
	}
	.btn.btn-outline {
		background-color: black; 
	}
	@media screen and (max-width: 767px) {
		.navbar .navbar-collapse .navbar-right > li:last-child { 
			padding-left: 15px; 
			padding-right: 15px; 
		} 
		.navbar .nav-collapse { 
			margin: 7.5px auto; 
			padding: 0; 
		}
		.navbar .nav-collapse .navbar-form {
			margin: 0; 
		}
		.nav-collapse>li { 
			float: none; 
		}
	}
</style>
</head>
<body>
	 <!-- Second navbar for search -->
	<nav class="navbar navbar-inverse">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="{{ action('PostsController@index') }}">Shreddit</a>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar-collapse-3">
		  <ul class="nav navbar-nav navbar-right">
			@if(Auth::check())
				<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
				<li><a href="{{ action('PostsController@create') }}">Post</a></li>
				<li><a href="{{ action('PostsController@show') }}">Profile</a></li>
			@else
				<li><a href="{{ action('Auth\AuthController@getLogin')}}">Login</a></li>
				<li><a href="{{ action('Auth\AuthController@postRegister')}}">Register</a></li>
			@endif
			<li><a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse3">Search</a></li>
		  </ul>
		  <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse3">
			<form method="GET" action="{{ action('PostsController@search') }}" class="navbar-form navbar-right" role="search">
			  <div class="form-group">
				{{ csrf_field() }}
				<input 
					type="text"
					class="form-control"
					name="search"
					id="search"
					placeholder="Search">
			  </div>
			  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
			</form>
		  </div>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container -->
	</nav><!-- /.navbar -->
	<div class="container">
		@yield('content')
		<div>
			@if (session()->has('message'))
				<div class="alert alert-success">{{ session('message') }}</div>
			@endif
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$('[data-toggle="offcanvas"]').click(function(){
	   $("#navigation").toggleClass("hidden-xs");
	});
	});
	function doAjax(url, method, data, callback) {
		$.ajax(url, {
			type: method,
			data: data
		}).done(callback);
	}
	$(document).ready(function() {
		$('.vote').on('click', function() {
				var data = {
					_token: $('#csrf-token').val(),
					vote: $(this).data('vote'),
					post_id: $(this).data('postId')
				};
				var url = $('#vote-url').val();

				var callback = function(data) {
					console.log(data.vote_score);
					$('#vote-score').text(data.vote_score);
					$('.votes').removeClass('active');
					$('[data-vote="' + data.vote + '"]').addClass('active');
				}

				doAjax(url, "POST", data, callback);
		})
	})
</script>
</body>
</html>