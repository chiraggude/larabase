<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {


	protected $table = 'permissions';

	protected $fillable = ['name', 'description'];

	public function roles()
	{
		return $this->belongsToMany('App\Role')->withTimestamps();
	}

	public function getKey()
	{
		return $this->attributes['id'];
	}

}