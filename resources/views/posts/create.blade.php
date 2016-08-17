@extends('layouts.master')
@section('content')
<h1>Please fill out this ugly form</h1>
   <form method="POST" action="{{ action('PostsController@store') }}">
	{!! csrf_field() !!}
		Title: <input type="text" name="title" value="{{ old('title') }}">
		Content: <textarea name="content" rows="5" cols="40">{{ old('content') }}</textarea>
		Url: <input type="text" name="url" value="{{ old('url') }}">
		<input type="submit">
	</form>
@stop