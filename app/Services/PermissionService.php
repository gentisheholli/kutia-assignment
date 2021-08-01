<?php

namespace App\Services;

use App\Models\Permission;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class PermissionService
{
	public function __construct(PermissionRepository $permission)
	{
		$this->permission = $permission ;
	}

	public function index()
	{
		return $this->permission->getAllPermissions();
	}

    public function createOrUpdate(Request $request)
	{
		$attributes = $request->all();
	
		return $this->permission->create($attributes);
	}

	public function read($id)
	{
     return $this->permission->getPermissionById($id);
	}

	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->permission->update($id, $attributes);
	}

	public function delete($id)
	{
      return $this->permission->delete($id);
	}
}