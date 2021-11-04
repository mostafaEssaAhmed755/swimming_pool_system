<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'admin', 
            'username' => 'admin', 
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
    
        $role = Role::create(['name' => 'سوبر-ادمن']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
