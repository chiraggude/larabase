<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {


	protected $table = 'tags';

	protected $fillable = ['name'];

	public static $rules = [
		'name' => 'required|min:3'
	];

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public function posts()
	{
		return $this->belongsToMany('App\Post');
	}
}