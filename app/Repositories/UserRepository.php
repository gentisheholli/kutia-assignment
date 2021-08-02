<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected $user, $role, $roleUser;

    public function __construct(User $user, Role $role, RoleUser $roleUser)
    {
        $this->user = $user;
        $this->role = $role;
        $this->roleUser = $roleUser;
    }

    public function getAllUsers()
    {
        return $this
            ->user
            ->get();
    }

    public function getUserById($id)
    {
        return $this
            ->user
            ->where('id', $id)->get();
    }

    public function createOrUpdate($id = null, $collection = [])
    {
        if (is_null($id))
        {
            $user = new $this->user;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            $user->save();

            $roleUser = new $this->roleUser;
            $roleUser->role_id = $collection['role_id'];
            if ($collection['role_id'] == null)
            {
                $collection['role_id'] = 2;
            }
            $roleUser->user_id = $user->id;
            $roleUser->save();

            return true;

        }
        $user = $this
            ->user
            ->find($id);
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        $user->save();

        $roleUser = $this
            ->roleUser
            ->find($id);
        $roleUser->role_id = $collection['role_id'];
        if ($collection['role_id'] == null)
        {
            $collection['role_id'] = 2;
        }
        $roleUser->save();

        return true;

    }

    public function deleteUser($id)
    {
        $user = $this->getUserById($id)->delete();
        $roleUser = $this
            ->roleUser
            ->where('user_id', $id)->delete();

        return true;
    }
}

