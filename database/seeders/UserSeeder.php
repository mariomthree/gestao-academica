<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'       => 'Admin',
            'email'      => 'admin@gmail.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $user2 = User::create([
            'name'       => 'Direccao M. Educacao',
            'email'      => 'meducation@gmail.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user3 = User::create([
            'name'       => 'Instituicao de Ensino',
            'email'      => 'institution@gmail.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $admin = Role::where('name','admin')->first();
        $meducation = Role::where('name','meducation')->first();

        $user->attachRole($admin); 
        $user2->attachRole($meducation); 
        $user3->attachRole($institution); 
    }
}
