namespace App\Repository;
use App\Models\Role;


class RoleRepository 
{   
    protected $role = null;

    public function getAllRoles()
    {
        return Role::all();
    }

    public function getRoleById($id)
    {
        $role = Role::findOrFail($id);
		$rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
		->where("role_has_permissions.role_id",$id)
		->get();

		return compact('role','rolePermissions');
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $role = new Role;
            $role->name = $collection['name'];
            return $role->save();
        }
        $role = Role::find($id);
		$role->name = $request->input('name');
		$role->save();
		$role->syncPermissions($request->input('permission'));
    }
    
    public function deleteRole($id)
    {
        $role = Role::find($id);

        if (is_null($role)) {
            return response()->json(["message" => "Role was not found."]);
        }

        $role->delete();
        return response()->json(["message" => "Role was deleted successfully."]);
    }
}