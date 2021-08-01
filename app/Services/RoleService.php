<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleService
{
	public function __construct(RoleRepository $role)
	{
		$this->role = $role ;
	}

	public function index()
	{
		return $this->role->getAllRoles();
	}

    public function createOrUpdate(Request $request)
	{
		$attributes = $request->all();
	
		return $this->role->create($attributes);
	}

	public function read($id)
	{
     return $this->role->getRoleById($id);
	}

	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->role->update($id, $attributes);
	}

	public function delete($id)
	{
      return $this->role->delete($id);
	}
}