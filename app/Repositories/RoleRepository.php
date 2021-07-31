<?php
namespace App\Repository;
use App\Models\Role;
use App\Models\Permission;


class RoleRepository 
{   
    protected $role;
    protected $permission;

    public function __construct(Role $role,Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }


    public function getAllRoles()
    {
        return $this->role->get();
    }

    public function getRoleById($id)
    {
        $role = $this->role->find($id);
		$rolePermissions = $this->permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
		->where("role_has_permissions.role_id",$id)
		->get();

		return compact('role','rolePermissions');
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $role = new $this->role;
            $role->name = $collection['name'];
            return $role->save();
        }
        $role = $this->role->find($id);
		$role->name = $request->input('name');
		$role->save();
		$role->syncPermissions($request->input('permission'));
    }
    
    public function deleteRole($id)
    {
        $role = $this->role->find($id);

        if (is_null($role)) {
            return response()->json(["message" => "Role was not found."]);
        }

        $role->delete();
        return response()->json(["message" => "Role was deleted successfully."]);
    }
}