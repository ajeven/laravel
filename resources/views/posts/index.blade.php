@extends('layouts.master')

@section('content')
	<table class="table">
			<tbody>
					@foreach ($posts as $post)
					<tr>
						<td>
							<div class="upvote topic" data-post="{{ $post->id }}">
							 	<div class="upvote vote glyphicon glyphicon-plus-sign" data-post="{{ $post->id }}" data-vote="1"></div>
							 		<span class="vote-score text-center">{{ $post->voteScore() }}</span>
							 	<div class="downvote vote glyphicon glyphicon-minus-sign" data-post="{{ $post->id }}" data-vote="-1"></div>
							 	<input type="hidden" id="vote" name="vote" value="">
							 	<input type="hidden" id="post_id" name="post_id" value="">
							</div>
							</form>
						</td>
						<td>{{ $post->title}}</td>
						<td><a href="http://{{ $post->url }}" target="_Blank">{{ $post->url }}</a></td>
						<td>{{ $post->content }}</td>
						<td>{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
						<td>{{ $post->updated_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
						<td>{{ $post->user->name }}</td>
					</tr>
					@endforeach
			</tbody>
		<tfoot>
			<tr>
				<td colspan="7" class="text-center">{!! $posts->render() !!}</td>
			</tr>
		</tfoot>	
	</table>
@stop
