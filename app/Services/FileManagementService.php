<?php

namespace App\Services;

use App\Models\FileManagement;
use App\Repositories\FileManagementRepository;
use Illuminate\Http\Request;

class FileManagementService
{
	public function __construct(FileManagementRepository $file)
	{
		$this->fileManagement = $file ;
	}

	public function index()
	{
		return $this->fileManagement->all();
	}

    public function create(Request $request)
	{
             $attributes = $request->all();
         
             return $this->fileManagement->create($attributes);
	}

	public function read($id)
	{
     return $this->fileManagement->find($id);
	}

	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->fileManagement->update($id, $attributes);
	}

	public function delete($id)
	{
      return $this->fileManagement->delete($id);
	}
}