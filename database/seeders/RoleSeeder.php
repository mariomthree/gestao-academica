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
        //Roles
        Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator', 
            'description' => 'User is allowed to manage and edit other users', 
        ]);

        Role::create([
            'name' => 'direction',
            'display_name' => 'Directorate of the Ministry of Education', 
            'description' => 'The board of the ministry of education is permitted to administer and edit educational institutions.', 
        ]);
        
        Role::create([
            'name' => 'education',
            'display_name' => 'Educational Institution', 
            'description' => 'Educational institution manages productivity data', 
        ]);
    }
}