<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'first_name'=> 'Super',
            'last_name'=> 'Admin',
            'email' => 'johndoe@example.com',
            'password' => 'secret'
        ]);
        // \App\Models\User::factory(10)->create();
        
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);


        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions(Permission::all());
        $user->assignRole($role);
    }
}
