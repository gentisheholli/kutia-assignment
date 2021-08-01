<?php
namespace App\Repository;
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
        return $this->permission->get();
	}

	public function getPermissionById($id)
    {
        return $this->permission->where('id', $id)->get();
    }
    /**
     * Store a newly created permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function create($collection)
	{     
			$permission = new $this->permission;
        
			$name = $collection['name'];
			$permission->name = $name;
			$roles = $collection['roles'];
			$permission->save();

			if (!empty($collection['roles'])) { //If one or more role
				foreach ($roles as $role) {
					$r = Role::where('id', '=', $role)->firstOrFail();
					$permission = Permission::where('name', '=', $name)->first();
					$r->givePermissionTo($permission);
				}
			}
	}
    

    /**
     * Update the specified permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update($collection, $id)
	{
		try{
			$permissionUpdate = $this->permission::findOrFail($id);
			$input = $request->all();
			$permissionUpdate->fill($input)->save();

			return redirect()->route('permissions.index')
			->with('flash_message',
			'Permission'. $permission->name.' updated!');
		}
		catch(Exception $e){
			$data = array('msg' => 'Error occured. Permission failed to get updated', 'error' => true);
			echo json_encode($data);
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
