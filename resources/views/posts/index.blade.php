@extends('layouts.master')

@section('content')
	<table class="table">
			<tbody>
					@foreach ($posts as $post)
					<tr>
						<td>
							<div class="row">
								<i class="vote glyphicon glyphicon-plus-sign center-block {{ (!is_null($user_vote) && $user_vote->vote) ? 'active' : '' }}" data-vote="1" data-post-id="{{ $post->id }}"></i>
									<span class="vote-score text-center" id="vote-score">{{ $post->vote_score}}</span>
								<i class="vote glyphicon glyphicon-minus-sign center-block {{ (!is_null($user_vote) && !$user_vote->vote) ? 'active' : '' }}" data-vote="0" data-post-id="{{ $post->id }}"></i>
							</div>
							<input type="hidden" id="vote-url" value="{{ action('PostsController@addVote') }}">
							<input type="hidden" id="csrf-token" value="{{ Session::token() }}">
							<input type="hidden" id="is-logged-in" value="{{ Auth::check() }}">
						</td>
						<td><a href="{{ action('PostsController@show') }}">{{ $post->title}}</a></td>
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

<div class="row">
