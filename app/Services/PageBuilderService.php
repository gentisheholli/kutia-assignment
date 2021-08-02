<?php

namespace App\Services;

use App\Models\PageBuilder;
use App\Repositories\PageBuilderRepository;
use Illuminate\Http\Request;

class PageBuilderService
{
	public function __construct(PageBuilderRepository $pageBuilder)
	{
		$this->pageBuilder = $pageBuilder ;
	}

	public function index()
	{
		return $this->pageBuilder->getAllPages();
	}

    public function create(Request $request)
	{
		$attributes = $request->all();
	
		return $this->pageBuilder->create($attributes);
	}

	public function read($id)
	{
     return $this->pageBuilder->getPageBuilderById($id);
	}

	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->pageBuilder->update($id, $attributes);
	}

	public function delete($id)
	{
      return $this->pageBuilder->deletePage($id);
	}
}