<?php
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

  
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Spatie\Permission\Models\Role::all() as $role) {
            $users = factory(User::class, 3)->create();
            foreach($users as $user){
                $user->assignRole($role);
            }
         }
    }
}