<?php

class Role extends \Eloquent {


	protected $table = 'roles';

	protected $fillable = ['name'];

	// Assign Permissions to the Role
	public function assignPermissions($permissions)
	{
		$this->permissions()->sync($permissions);
	}

	public function users()
	{
		return $this->belongsToMany('User')->withTimestamps();
	}

	public function permissions()
	{
		return $this->belongsToMany('Permission')->withTimestamps();
	}

}