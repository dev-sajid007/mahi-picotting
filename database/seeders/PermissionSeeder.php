<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDashboard = Module::updateOrCreate(['name'=>'Admin Dashboard']);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppDashboard->id,
            'name'      => 'Access Dashboard',
            'slug'      => 'app.dashboard'
        ]);

        //Create Permission for Role Management

        $moduleAppRole = Module::updateOrCreate(['name'=>'Role Management']);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      => 'Access Role',
            'slug'      => 'app.roles.index'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      => 'Create Role',
            'slug'      => 'app.roles.create'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      => 'Edit Role',
            'slug'      => 'app.roles.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      => 'Delete Role',
            'slug'      => 'app.roles.delete'
        ]);

        //Create Permission for User Management

        $moduleAppUser = Module::updateOrCreate(['name'=>'User Management']);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      => 'Access User',
            'slug'      => 'app.users.index'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      => 'Create User',
            'slug'      => 'app.users.create'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      => 'Edit User',
            'slug'      => 'app.users.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      => 'Delete User',
            'slug'      => 'app.users.delete'
        ]);
        //Create Permission for User Management

        $moduleAppEmployee = Module::updateOrCreate(['name'=>'Employee Management']);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppEmployee->id,
            'name'      => 'Access Employee',
            'slug'      => 'app.employees.index'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppEmployee->id,
            'name'      => 'Create Employee',
            'slug'      => 'app.employees.create'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppEmployee->id,
            'name'      => 'Edit Employee',
            'slug'      => 'app.employees.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppEmployee->id,
            'name'      => 'Delete Employee',
            'slug'      => 'app.employees.delete'
        ]);
        //Create Permission for Report Management

        $moduleAppReport = Module::updateOrCreate(['name'=>'Report Management']);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppReport->id,
            'name'      => 'Access Report',
            'slug'      => 'app.reports.index'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppReport->id,
            'name'      => 'Create Report',
            'slug'      => 'app.reports.create'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppReport->id,
            'name'      => 'Edit Report',
            'slug'      => 'app.reports.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppReport->id,
            'name'      => 'Delete Report',
            'slug'      => 'app.reports.delete'
        ]);
    }
}
