<?php
namespace App\Repositories;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRepository
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of permissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllPermissions()
    {
        return $this
            ->permission
            ->get();
    }

    public function getPermissionById($id)
    {
        return $this
            ->permission
            ->where('id', $id)->get();
    }

    public function createOrUpdate($id = null, $collection)
    {
        if (is_null($id))
        {

            $permission = new $this->permission;

            $name = $collection['name'];
            $permission->name = $name;
            $roles = $collection['roles'];
            return $permission->save();
        }

        if (!empty($collection['roles']))
        { //If one or more role
            foreach ($roles as $role)
            {
                $r = Role::where('id', '=', $role)->firstOrFail();
                $permission = Permission::where('name', '=', $name)->first();
                $r->givePermissionTo($permission);
            }
        }
    }

    /**
     * Remove the specified permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePermission($id)
    {
        $permission = $this->permission::findOrFail($id);
        $permission->delete();
    }
}

