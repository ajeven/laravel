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
					@foreach ($posts as $post)
					<tr>
						<td>{{ $post->title }}</td>
						<td>{{ $post->url }}</td>
						<td>{{ $post->content }}</td>
					</tr>
					@endforeach
			</tbody>
		<tfoot>
			<tr>
				<td colspan="3" class="text-center">{!! $posts->render() !!}</td>
			</tr>
		</tfoot>	
	</table>
@stop