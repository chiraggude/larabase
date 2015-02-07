<?php

class Permission extends \Eloquent {


	protected $table = 'permissions';

	protected $fillable = ['name', 'description'];

	public function roles()
	{
		return $this->belongsToMany('Role')->withTimestamps();
	}

	public function getKey()
	{
		return $this->attributes['id'];
	}

}