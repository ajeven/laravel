@extends('layouts.master')

@section('content')
		<table class="table">
		<tbody>
			<tr>
				<td>{{ $post->title}}</td>
				<td>{{ $post->url}}</td>
				<td>{{ $post->content}}</td>
			</tr>
		</tbody>	
	</table>@stop