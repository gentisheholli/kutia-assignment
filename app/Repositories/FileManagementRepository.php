<?php
namespace App\Repositories;

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
        return $this
            ->fileManagement
            ->get();
    }

    public function getFileById($id)
    {
        return $this
            ->fileManagement
            ->where('id', $id)->get();
    }

    public function getUserFiles($userId)
    {

        $currentuser = Auth::user();
        return $this->fileManagement::where('user_id', '=', $currentuser->id)
            ->get();

    }

    public function create(array $collection)
    {
        $fileManagement = new $this->fileManagement;
        $fileName = $collection['file_name'];

        $file = time() . rand(123456, 999999) . '.' . $fileName->getClientOriginalExtension();

        $fileName->move(public_path('/uploads') , $file);
        $fileManagement->user_id = $collection['user_id'];
        $fileManagement->file_name = $file;

        return $fileManagement->save();
    }


    public function deleteFile($id)
    {
        $fileManagement = $this->fileManagement::find($id);

        if (is_null($fileManagement))
        {
            return response()->json(["message" => "File was not found"]);
        }

        if ($fileManagement->file_name)
        {
            $filename = $fileManagement->file_name;
            Storage::disk('public')
                ->delete("/uploads/" . $filename);
            $fileManagement->delete();
        };

        return true;
    }
}