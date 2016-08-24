@extends('layouts.master')
@section('content')
<h1>Regitration Form</h1>
	<form class="form-horizontal" method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="title">Name:</label> 
				<input 
					class="form-control"
					type="text" 
					name="name"
					id="name" >
		</div>
		@if ($errors->has('name'))
			{!! $errors->first('name', '<span class="help-block bg-danger">:message</span>') !!}
		@endif
		<div class="form-group">
			<label for="content">Email:</label> 
				<input 
					class="form-control" 
					type="text"
					name='email'
					id="email" >
		</div>
		@if ($errors->has('email'))
			{!! $errors->first('email', '<span class="help-block bg-danger">:message</span>') !!}
		@endif
		<div class="form-group">
			<label for="url">Password:</label>
				<input 
					class="form-control" 
					type="password"
					name="password"
					id="password" >
		</div>
		@if ($errors->has('password'))
			{!! $errors->first('password', '<span class="help-block bg-danger">:message</span>') !!}
		@endif
		<div class="form-group">
			<label for="url">Confirm Password:</label>
				<input 
					class="form-control" 
					type="password"
					name="password_confirmation"
					id="password" >
		</div>
		@if ($errors->has('password'))
			{!! $errors->first('password', '<span class="help-block bg-danger">:message</span>') !!}
		@endif
			<button type="submit" class="btn btn-info">Register</button>
	</form>
@stop