@extends('layouts.master')
@section('content')
<h1>Please edit this form</h1>
	<form class="form-horizontal" method="POST" action="{{ action('PostsController@update', $post->id) }}">
		<input type="hidden" name="_method" value="PUT">
			{!! csrf_field() !!}
		<div class="form-group">
			<label for="title">Title:</label> 
				<input 
					class="form-control"
					type="text" 
					name="title"
					id="title" 
					value="{{ $post->title }}">
		</div>
		@if ($errors->has('title'))
			{!! $errors->first('title', '<span class="help-block bg-danger">:message</span>') !!}
		@endif
		<div class="form-group">
			<label for="content">Content:</label> 
				<input 
					class="form-control" 
					name="content"
					type="text"
					name='content'
					id="content" 
					value="{{ $post->content }}">
		</div>
		@if ($errors->has('content'))
			{!! $errors->first('content', '<span class="help-block bg-danger">:message</span>') !!}
		@endif
		<div class="form-group">
			<label for="url">Url:</label>
				<input 
					class="form-control" 
					type="text"
					name="url"
					id="url" 
					value="{{ $post->url }}">
		</div>
		@if ($errors->has('url'))
			{!! $errors->first('url', '<span class="help-block bg-danger">:message</span>') !!}
		@endif
			<button type="submit" class="btn btn-info">Update</button>
	</form>
	<span>OR</span>
	<form class="form-inline" method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
		<input type="hidden" name="_method" value="DELETE">
		{!! csrf_field() !!}
		<button type="submit" class="btn btn-danger"><a href="{{ action('PostsController@destroy', $post->id) }}"></a>Delete</button>
	</form>
	<span>OR</span>
	<form class="form-inline restore" method="POST" action="{{ action('PostsController@restore', $post->id) }}">
		<input type="hidden" name="_method" value="POST">
		{!! csrf_field() !!}
		<button type="submit" class="btn btn-success"><a href="{{ action('PostsController@restore', $post->id) }}"></a>Restore</button>
	</form>
@stop