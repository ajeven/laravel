<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
	use SoftDeletes;
	protected $table = 'posts';
	protected $softDeletes = true;
	//dont really need this line laravel will use these col names automagically
	protected $dates = ['created_at', 'updated_at'];

	public static $rules = [
		'title' => 'required|min:5|max:100',
		'url'   => 'required',
		'content' => 'required'
		];
	protected function formatValidationErrors(Validator $validator)
	{
		return $validator->errors()->all();
	}
	public function setContentAttribute($value)
	{
		$this->attributes['content'] = strip_tags($value);
	}
	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = strip_tags($value);
	}
	public function setUrlAttribute($value)
	{
		$this->attributes['url'] = strip_tags($value);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function votes() 
	{
		return $this->hasMany(Votes::class);
	}
	public static function sortPosts($pageSize)
	{
		return Post::with('user')->orderBy('created_at', 'desc')->paginate($pageSize);
	}
	public static function searchPosts($search)
	{
		return Post::where('content', 'LIKE', '%' . $search . '%')->with('user')->paginate(10);
	}
	public function downvotes()
	{
		return $this->votes()->where('vote', '=', 0);
	}
	public function upvotes()
	{
		return $this->votes()->where('vote', '=', 1);
	}
	public function voteScore()
	{
		$upVotes = $this->upvotes()->count();
		$downVotes = $this->downvotes()->count();
		return $upVotes - $downVotes;
	}
	public static function userVote(User $user)
	{
		return Votes::where('user_id', '=', $user->id)->first();
	}
}
