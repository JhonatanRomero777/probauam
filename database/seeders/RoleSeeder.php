<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Professional']);
        $role3 = Role::create(['name'=>'Patient']);

        // Permission::create(['name'=>'parameters.index'])->syncRoles([$role1,$role2]);
        // Permission::create(['name'=>'parameters.show'])->assignRole($role1);

        Permission::create(['name'=>'parameters.index'])->assignRole($role1);
        Permission::create(['name'=>'entities.index'])->assignRole($role1);
        Permission::create(['name'=>'professionals.index'])->assignRole($role1);
    }
}