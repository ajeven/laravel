<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    //dont really need this line laravel will use these col names automagically
    protected $dates = ['created_at', 'updated_at'];

    public static $rules = [
        'title' => 'required|max:100',
        'url'   => 'required',
        'content' => 'required'
    	];

    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

}
