<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
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
        $permission = $this->permission->find($id);

		if (is_null($permission)) {
			return $this->sendError('No Permission found.');
		}

		return $this->sendResponse($permission->toArray(), 'Permission list retrieved successfully.');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create()
	{
        //
	}

    /**
     * Store a newly created permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request)
	{
		try{       
			$permission = new Permission();
        
			$name = $request['name'];
			$permission->name = $name;
			$roles = $request['roles'];
			$permission->save();

			if (!empty($request['roles'])) { //If one or more role
				foreach ($roles as $role) {
					$r = Role::where('id', '=', $role)->firstOrFail();
					$permission = Permission::where('name', '=', $name)->first();
					$r->givePermissionTo($permission);
				}
			}
			return 'Permission '. $permission->name.' '.' added!';
		}
		catch(Exception $e){
			$data = array('msg' => 'Error occured. Permission failed to get created', 'error' => true);
			echo json_encode($data);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
		try {
			$permission = Permission::findOrFail($id);
			return $permission;
		}
		catch (Exception $e) {
			$data = array('msg' => 'Error occured. Permission could not be provided', 'error' => true);
			echo json_encode($data);
		}
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function edit($id)
	{
        //
	}

    /**
     * Update the specified permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, $id)
	{
		try{
			$permissionUpdate = Permission::findOrFail($id);
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
	public function destroy($id)
	{
		try{
			$permission = Permission::findOrFail($id);
			$permission->delete();

			if ($permission->name == "Administer roles & permissions") {
				return redirect()->route('permissions.index')
				->with('flash_message',
				'Cannot delete this Permission!');
			}
		}
		catch(Exception $e){
			$data = array('msg' => 'Error occured. Permission failed to get deleted', 'error' => true);
			echo json_encode($data);
		}
	}   
}
