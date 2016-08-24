@extends('layouts.master')

@section('content')
<h2>Please Log In.</h2>
	<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
		<div class="form-group">
			{{ csrf_field() }}
			<label for="username">Username:</label>
				<input
					type="text"
					class="form-control"
					name="email"
					id="email"
				>
				@if ($errors->has('email'))
				{!! $errors->first('email', '<span class="help-block bg-danger">:message</span>') !!}
				@endif
			<label for="pasword">Password:</label>
				<input
					type="password"
					class="form-control"
					name="password"
					id="password"
				>
				@if ($errors->has('password'))
				{!! $errors->first('password', '<span class="help-block bg-danger">:message</span>') !!}
				@endif
		</div>
		<button type="submit" class="btn btn-info">Login</button>
	</form>
@stop