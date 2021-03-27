<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $createUser = Permission::create([
            'name' => 'create-user',
            'display_name' => 'Create Users', 
            'description' => 'Create new user', 
        ]);
            
        $editUser = Permission::create([
            'name' => 'edit-user',
            'display_name' => 'Edit Users', 
            'description' => 'Edit existing users', 
        ]);
        
        $deleteUser = Permission::create([
            'name' => 'delete-user',
            'display_name' => 'Delete Users', 
            'description' => 'Delete existing users', 
        ]);
        
        $createEI = Permission::create([
            'name' => 'create-ei',
            'display_name' => 'Create Educational Institution', 
            'description' => 'Create new Educational Institution', 
        ]);
            
        $editEI = Permission::create([
            'name' => 'edit-ei',
            'display_name' => 'Edit Educational Institutions', 
            'description' => 'Edit existing Educational Institutions', 
        ]);
        
        $deleteEI = Permission::create([
            'name' => 'delete-ei',
            'display_name' => 'Delete Educational Institutions', 
            'description' => 'Delete existing Educational Institution', 
        ]);
            
        $createStudent = Permission::create([
            'name' => 'create-student',
            'display_name' => 'Create Users', 
            'description' => 'Create new user', 
        ]);
            
        $editStudent = Permission::create([
            'name' => 'edit-student',
            'display_name' => 'Edit Students', 
            'description' => 'Edit existing Students', 
        ]);
        
        $deleteStudent = Permission::create([
            'name' => 'delete-student',
            'display_name' => 'Delete Students', 
            'description' => 'Delete existing Students', 
        ]);
            
        $createTeacher = Permission::create([
            'name' => 'create-teacher',
            'display_name' => 'Create Users', 
            'description' => 'Create new user', 
        ]);
            
        $editTeacher = Permission::create([
            'name' => 'edit-teacher',
            'display_name' => 'Edit Teachers', 
            'description' => 'Edit existing Teachers', 
        ]);
        
        $deleteTeacher = Permission::create([
            'name' => 'delete-teacher',
            'display_name' => 'Delete Teachers', 
            'description' => 'Delete existing Teachers', 
        ]);

        $createProvince = Permission::create([
            'name' => 'create-province',
            'display_name' => 'Create Users', 
            'description' => 'Create new user', 
        ]);
            
        $editProvince = Permission::create([
            'name' => 'edit-province',
            'display_name' => 'Edit Provinces', 
            'description' => 'Edit existing Provinces', 
        ]);
        
        $deleteProvince = Permission::create([
            'name' => 'delete-province',
            'display_name' => 'Delete Provinces', 
            'description' => 'Delete existing Provinces', 
        ]);
    
        $createDistrict = Permission::create([
            'name' => 'create-district',
            'display_name' => 'Create Users', 
            'description' => 'Create new user', 
        ]);
            
        $editDistrict = Permission::create([
            'name' => 'edit-district',
            'display_name' => 'Edit Districts', 
            'description' => 'Edit existing Districts', 
        ]);
        
        $deleteDistrict = Permission::create([
            'name' => 'delete-district',
            'display_name' => 'Delete Districts', 
            'description' => 'Delete existing Districts', 
        ]);
        
        $admin = Role::where('name','admin')->first();
        $education = Role::where('name','education')->first();
        $direction = Role::where('name','direction')->first();

        $admin->syncPermissions([
            $createUser,
            $editUser,
            $deleteUser,
            $createDistrict,
            $editDistrict,
            $deleteDistrict,
            $createProvince,
            $editProvince,
            $deleteProvince
        ]);

        $direction->syncPermissions([
            $createEI,
            $editEI,
            $deleteEI
        ]); 
        
        $education->syncPermissions([
            $createStudent,
            $editStudent,
            $deleteStudent,
            $createTeacher,
            $editTeacher,
            $deleteTeacher
        ]);
    }
}
