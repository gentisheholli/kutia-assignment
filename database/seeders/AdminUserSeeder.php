<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Genti Sheholli', 
        	'email' => 'administrator@gmail.com',
        	'password' => bcrypt('123456')
        ]);
        // $role = Role::findOrFail(13);

        // $permissions = Permission::pluck('id','id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}
