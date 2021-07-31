<?php
namespace App\Repository;

use App\Models\FileManagement;
use Illuminate\Support\Facades\Hash;

class FileManagementRepository 
{   
    protected $fileManagement;

    public function __construct(FileManagement $fileManagement)
    {
        $this->fileManagement = $fileManagement;
    }


    public function getAllFiles()
    {
        return $this->fileManagement->get();
    }

    public function getFileById($id)
    {
        return $this->fileManagement->where('id', $id)->get();
    }

    public function getUserFiles($userId){
  
      $currentuser = Auth::user();
      return $this->fileManagement::where('user_id', '=', $currentuser->id)->get();

    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $fileManagement = new $this->fileManagement;
            $image = $fileManagement->file_name;
            $imageFile = time() . rand(123456, 999999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads'), $imageFile);
            $fileManagement->user_id = $collection['user_id'];

            return $fileManagement->save();
        }
        $fileManagement = $this->fileManagement::find($id);
        $fileManagement->file_name = $collection['file_name'];
        $fileManagement->user_id = $collection['user_id'];
        return $fileManagement->save();
    }
    
    public function deleteFile($id)
    {
        $fileManagement = $this->fileManagement::find($id);

        if (is_null($fileManagement)) {
            return response()->json(["message" => "File was not found"]);
        }

        if($fileManagement->file_name){
            $filename=$fileManagement->file_name;
            Storage::disk('public')->delete("/uploads/".$filename);
            $fileManagement->delete();
        };

        return true;
    }
}