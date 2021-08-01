<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class Permission_Has_Roles_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     foreach(Spatie\Permission\Models\Permission::all() as $permission) {
            $users = User::all();
            foreach($users as $user){
               $user->givePermissionTo($permission);
            }
         }
    }
}
