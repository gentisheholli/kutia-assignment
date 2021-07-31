<?php

namespace App\Http\Controllers;

use App\Models\PageBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\PageBuilderRequest;
use App\Services\PageBuilderService;

class PageBuilderController extends Controller
{
    protected $pageBuilderService;

    public function __construct(PageBuilderService $pageBuilderService)
	{
		$this->pageBuilderService = $pageBuilderService;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->pageBuilderService->index();
     
        if(count($pages)< 1){
            return ("No page found.");
        }
        return $pages;
        //return view('pageBuilder.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return view('pageBuilder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->pageBuilderService->create($request);

        return true;

       // return redirect()->route('pageBuilder.index')->with('message', 'Page created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageBuilder  $pageBuilder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $pageBuilder = $this->pageBuilderService->read($id);

        if($pageBuilder->isEmpty){
            return ("Page not found.");
        }
        return $pageBuilder;
        // return view('pageBuilder.show', compact('pageBuilder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageBuilder  $pageBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(PageBuilder $pageBuilder)
    {
        $pageBuilder = $this->pageBuilderService->read($id);

        return view('pageBuilder.edit', compact('pageBuilder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageBuilder  $pageBuilder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pageBuilder = $this->pageBuilderService->update($request, $id);
        return $pageBuilder;

        //return redirect()->back()->with('status', 'Page has been updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageBuilder  $pageBuilder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pageBuilder = $this->pageBuilderService->read($id);

        if(is_null($pageBuilder)) {
            return response()->json(["message" => "Page was not found."]);   
        }
        
        $pageBuilder->delete();
		//return redirect()->route('fileManagement.index')->with('message', 'Page deleted successfully.');
    }
}
