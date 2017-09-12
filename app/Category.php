<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {


	protected $table = 'categories';

	protected $fillable = ['name', 'description'];

	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'required|min:5'
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public function posts()
	{
		return $this->belongsToMany('App\Post');
	}
}