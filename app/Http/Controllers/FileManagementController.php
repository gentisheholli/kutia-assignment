<?php

namespace App\Http\Controllers;

use App\Models\FileManagement;
use Illuminate\Http\Requests\FileManagementRequest;
use Illuminate\Http\Request;
use App\Services\FileManagementService;

class FileManagementController extends Controller
{
    protected $fileManagementService;

	public function __construct(FileManagementService $fileManagementService)
	{
		$this->fileManagementService = $fileManagementService;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = $this->fileManagementService->index();

        if($files->isEmpty){
            return ("No file found.");
        }
        return view('fileManagement.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request){

        return view('fileManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileManagementRequest $request)
    {
        $this->fileManagementService->create($request);

        return redirect()->route('fileManagement.index')->with('message', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileManagement  $fileManagement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $file = $this->fileManagementService->read($id);

        if($file->isEmpty){
        return ("File not found.");
        }
         return view('fileManagement.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileManagement  $fileManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(FileManagement $fileManagement)
    {
        $file = $this->fileManagementService->read($id);

        return view('fileManagement.edit', compact('file'));
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
        $file = $this->fileManagementService->update($request->all(), $id);

        return redirect()->route(fileManagement.index)->with('message', 'File has been updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileManagement  $fileManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileManagement $fileManagement)
    {
        $file = $this->fileManagementService->read($id);

        if(is_null($file)) {
            return response()->json(["message" => "File was not found."]);   
        }
        $file->delete();
		return redirect()->route('fileManagement.index')->with('message', 'File deleted successfully.');
    }
}
