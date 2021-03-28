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
            'display_name' => 'Administrador', 
            'description' => 'O utilizador tem permissão para gerenciar e editar outros usuários', 
        ]);

        Role::create([
            'name' => 'meducation',
            'display_name' => 'Ministerio da Educação', 
            'description' => 'O ministério da educação tem permissão para administrar e editar instituições educacionais.', 
        ]);
        
        Role::create([
            'name' => 'institution',
            'display_name' => 'Instituição de Ensino', 
            'description' => 'Instituição de ensino gerencia os dados de produtividade.', 
        ]);
    }
}