<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
    	$this->middleware('auth', ['except' => ['index', 'show']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::sortPosts(10);
		return view('posts.index', ['posts' => $posts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{

		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		
		$post = new  Post();
		$post->user_id = Auth::user()->id;
		return $this->validateAndSave($post, $request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		// dd($data);
		if (!$post)
		{
			abort(404);
		}

		return view('posts.show', ['post' => $post]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{   
		$post = Post::withTrashed()->where('id', $id)->first();
		if (!$post)
		{
			abort(404);
		}

		return view('posts.edit', ['post' => $post]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$post = Post::find($id);
		return $this->validateAndSave($post, $request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id)
	{
		$post = Post::find($id);
		$post->delete();
		$request->session()->flash('message', 'Post has been deleted');
		return redirect()->action('PostsController@index');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function restore(Request $request, $id) 
	{
		$post = Post::withTrashed()->where('id', $id)->first();
		$post->restore();
		$post->save();
		$request->session()->flash('message', 'Posts have been restored');
		return redirect()->action('PostsController@index');
	}
	// put this in profilecontroller later
	// public function profile(Post $post)
	// {
	// 	return view('auth.account', ['post' => $post]);
	// }
	private function validateAndSave(Post $post, Request $request)
	{
		$this->validate($request, Post::$rules);
		$post->title = $request->input('title');
		$post->url= $request->input('url');
		$post->content = $request->input('content');
		$post->save();
		$request->session()->flash('message', 'We have made liftoff');
		return redirect()->action('PostsController@index');
	}
	public function addVote(Request $request)
	{
		$vote = Vote::with('post')->firstOrCreate([
			'post_id' => $request->input('post_id'),
			'user_id' => $request->user()->id
			]);
		$vote->votes = $request->input('votes');
		$vote->save();

		$post = $vote->post;
	
	}
	public function search(Post $post, Request $request)
	{
		$search = $request->input('search');

		if ($search) {
			$results = Post::searchPosts($search);
		}
		return view('posts.results', ['search' => $results]);
	}

}
