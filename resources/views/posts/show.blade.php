@extends('layouts.master')

@section('content')
	<div class="col-md-4">
		<div class="row">
			<span>{{ $user->name }}</span>
		</div>
		<div class="row">
			<span>{{ $user->email }}</span>
		</div>
		<div class="row">
			<button class="btn btn-warning"><a href="#">Change Password</a></button>
		</div>
	</div>
		<table class="table">
		<tbody>
			@foreach ($posts as $post)
			<tr>
				<td>{{ $post->title }}</td>
				<td><a href="http://{{ $post->url }}">{{ $post->url}}</a></td>
				<td>{{ $post->content}}</td>
			</tr>
			@endforeach
		</tbody>	
		<tfoot>
			<td colspan="3" class="text-center">{!! $posts->render() !!}</td>
		</tfoot>
	</table>@stop