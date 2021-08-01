<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\PageBuilderRequest;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
	{
		$this->roleService = $roleService;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleService->index();
     
        if(count($roles)< 1){
            return ("No role found.");
        }
        return $role;
        //return view('role.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->roleService->create($request);

        return true;

       // return redirect()->route('role.index')->with('message', 'Page created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $role = $this->roleService->read($id);

        if($role->isEmpty){
            return ("Role not found.");
        }
        return $role;
        // return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = $this->roleService->read($id);

        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = $this->roleService->update($request, $id);
        return $role;

        //return redirect()->back()->with('status', 'Page has been updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->roleService->read($id);

        if(is_null($role)) {
            return response()->json(["message" => "Role was not found."]);   
        }
        
        $role->delete();
		//return redirect()->route('fileManagement.index')->with('message', 'Page deleted successfully.');
    }
}
