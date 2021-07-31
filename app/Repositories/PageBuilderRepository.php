<?php
namespace App\Repositories;
use App\Models\PageBuilder;

class PageBuilderRepository 
{   
    protected $pageBuilder;

    public function __construct(PageBuilder $pageBuilder)
    {
        $this->pageBuilder = $pageBuilder;
    }


    public function getAllPages()
    {
        return $this->pageBuilder->get();
    }

    public function getPageBuilderById($id)
    {
        return $this->pageBuilder->where('id', $id)->get();
    }

    public function getPageBuilderByStatus($status)
    {
        return $this->pageBuilder->where('status', $status)->get();
    }

    public function create($collection)
    {
        $pageBuilder = new $this->pageBuilder;
        $pageBuilder->title = $collection['title'];
        $pageBuilder->content = $collection['content'];
        $pageBuilder->status =  $collection['status'];
    
        return $pageBuilder->save();
    }

    public function update($collection, $id)
    {
        $pageBuilder = $this->pageBuilder->find($id);
        
        $pageBuilder->title = $collection['title'];
        $pageBuilder->content = $collection['content'];
        $pageBuilder->status =  $collection['status'];
        
 
        return $pageBuilder->update($collection);

    }

    
    public function deletePage($id)
    {
       return $this->getPageBuilderById($id)->delete();
    }
}