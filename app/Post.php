<?php

namespace App;
use Illuminate\Database\Eloquent\Softdeletes;
use Illuminate\Database\Eloquent\Model;

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
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
