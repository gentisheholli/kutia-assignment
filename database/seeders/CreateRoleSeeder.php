<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create(['guard_name' => 'api', 'name' => 'administrator']);
        // $role1->hasPermissionTo(Permission::all('admin'));

        $role2 = Role::create(['guard_name' => 'api', 'name' => 'post-maintainer']);
        // $role2->hasPermissionTo(Permission::all('post-maintainer'));
        // $role2->hasPermissionTo('applyWidget-list');
        // $role2->hasPermissionTo('applyWidget-list');
        // $role2->hasPermissionTo('applyWidget-list');
        // $role2->hasPermissionTo('applyWidget-list');
 
     
    }
}
