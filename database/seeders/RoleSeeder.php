<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $roles = ['administrator','direccao','educacao'];
        foreach($roles as $role)
            Role::create(['name'=>$role, 'created_at'=>now(), 'updated_at'=>now()]);
    }
}
