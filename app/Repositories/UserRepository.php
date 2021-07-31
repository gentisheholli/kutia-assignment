<?php
namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{   
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function getAllUsers()
    {
        return $this->user->get();
    }

    public function getUserById($id)
    {
        return $this->user->where('id', $id)->get();
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $user = new $this->user;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');

            return $user->save();
        }
        $user = $this->user->find($id);
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        return $user->save();
    }
    
    public function deleteUser($id)
    {
        return $this->getUserById($id)->softDeletes();
    }
}