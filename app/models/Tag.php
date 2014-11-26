<?php

class Tag extends \Eloquent {

	protected $fillable = ['name'];


	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}