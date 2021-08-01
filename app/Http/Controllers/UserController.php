<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $userService;

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->index();

        if($users->isEmpty){
            return ("No user found.");
        }
        return view('user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userService->create($request);

        return redirect()->route('user.index')->with('message', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileManagement  $fileManagement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userService->read($id);

        if($user->isEmpty){
        return ("User not found.");
        }
         return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileManagement  $fileManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(FileManagement $fileManagement)
    {
        $user = $this->userService->read($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileManagement  $fileManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileManagement $fileManagement)
    {
        $user = $this->userService->update($request, $id);

        return redirect()->route('user.index')->with('message', 'User has been updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileManagement  $fileManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileManagement $fileManagement)
    {

        $user = $this->userService->read($id);

        if(is_null($user)) {
            return response()->json(["message" => "User was not found."]);   
        }
        $user->delete();
		return redirect()->route('user.index')->with('message', 'User deleted successfully.');
    }
}
