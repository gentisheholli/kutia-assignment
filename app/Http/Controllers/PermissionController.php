<?php
namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this
            ->permissionService
            ->index();

        if (count($roles) < 1)
        {
            return ("No permission found.");
        }
        return $permission;
        //return view('permission.index', compact('pages'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this
            ->permissionService
            ->create($request);

        return true;

        // return redirect()->route('permission.index')->with('message', 'Page created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = $this
            ->permissionService
            ->read($id);

        if ($permission->isEmpty)
        {
            return ("Permission not found.");
        }
        return $permission;
        // return view('permission.show', compact('permission'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this
            ->permissionService
            ->read($id);

        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = $this
            ->permissionService
            ->update($request, $id);
        return $permission;

        //return redirect()->back()->with('status', 'Page has been updated succesfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this
            ->permissionService
            ->read($id);

        if (is_null($permission))
        {
            return response()->json(["message" => "Permission was not found."]);
        }

        $permission->delete();
        //return redirect()->route('permission.index')->with('message', 'Permision deleted successfully.');
        
    }
}

