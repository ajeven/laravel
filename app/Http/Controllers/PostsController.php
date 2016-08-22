<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$posts = Post::paginate(4);
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
		$post->user_id = 1;
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
	private function validateAndSave(Post $post, Request $request)
	{
		$this->validate($request, Post::$rules);
		$post->title = $request->input('title');
		$post->url= $request->input('url');
		$post->content  = $request->input('content');
		$post->save();
		$request->session()->flash('message', 'We have made liftoff');
		return redirect()->action('PostsController@index');
	}
}
