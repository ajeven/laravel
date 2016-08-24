@extends('layouts.master')

@section('content')
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>URL</th>
				<th>Content</th>
				<th>Created</th>
				<th>Updated</th>
				<th>Owner</th>
			</tr>
		</thead>
			<tbody>
				@if ($search->count() === 0)
					<td colspan="6" class="text-center">No result found<td>
				@else
					@foreach ($search as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td><a href="http://{{ $post->url }}" target="_Blank">{{ $post->url }}</a></td>
							<td>{{ $post->content }}</td>
							<td>{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
							<td>{{ $post->updated_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
							<td>{{ $post->user->name }}</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		<tfoot>
			<tr>
				<td colspan="6" class="text-center">{!! $search->render() !!}</td>
			</tr>
		</tfoot>	
	</table>
@stop