@extends('layouts.master')

@section('content')
		<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>URL</th>
				<th>Content</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $post->title}}</td>
				<td>{{ $post->url}}</td>
				<td>{{ $post->content}}</td>
			</tr>
		</tbody>	
	</table>@stop