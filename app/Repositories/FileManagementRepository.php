namespace App\Repository;

use App\Models\FileManagement;
use Illuminate\Support\Facades\Hash;

class FileManagementRepository 
{   
    protected $fileManagement = null;

    public function getAllFiles()
    {
        return FileManagement::all();
    }

    public function getFileById($id)
    {
        return FileManagement::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $fileManagement = new FileManagement;
            $image = $fileManagement->file_name;
            $imageFile = time() . rand(123456, 999999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads'), $imageFile);
            $fileManagement->user_id = $collection['user_id'];

            return $fileManagement->save();
        }
        $fileManagement = FileManagement::find($id);
        $fileManagement->file_name = $collection['file_name'];
        $fileManagement->user_id = $collection['user_id'];
        return $fileManagement->save();
    }
    
    public function deleteFile($id)
    {
        $fileManagement = FileManagement::find($id);

        if (is_null($fileManagement)) {
            return response()->json(["message" => "Staff member was not found.."]);
        }

        if($fileManagement->file_name){
            $filename=$fileManagement->file_name;
            Storage::disk('public')->delete("/uploads/".$filename);
            $fileManagement->delete();
        };

        return true;
    }
}