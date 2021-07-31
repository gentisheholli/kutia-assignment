namespace App\Repository;
use App\Models\PageBuilder;


class PageBuilderRepository 
{   
    protected $pageBuilder = null;

    public function getAllPages()
    {
        return PageBuilder::all();
    }

    public function getPageBuilderById($id)
    {
        return PageBuilder::find($id);
    }

    public function getPageBuilderByStatus($status)
    {
        $pages = DB::table('pages')->where($status,$pages->status)->get();
        return $pages;
    }


    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $pageBuilder = new PageBuilder;
            $pageBuilder->title = $collection['title'];
            $pageBuilder->content = $collection['content'];
            $pageBuilder->status =  $collection['status'];
            return $pageBuilder->save();
        }
        $pageBuilder = PageBuilder::find($id);
        $pageBuilder->title = $collection['title'];
        $pageBuilder->content = $collection['content'];
        $pageBuilder->status =  $collection['status'];
        return $user->save();
    }
    
    public function deletePage($id)
    {
        return PageBuilder::find($id)->delete();
    }
}