<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {


	protected $table = 'roles';

	protected $fillable = ['name'];

	// Assign Permissions to the Role
	public function assignPermissions($permissions)
	{
		$this->permissions()->sync($permissions);
	}

	public function users()
	{
		return $this->belongsToMany('App\User')->withTimestamps();
	}

	public function permissions()
	{
		return $this->belongsToMany('App\Permission')->withTimestamps();
	}

}