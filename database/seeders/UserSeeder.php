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
            'name'       => 'Mario M. Mabande',
            'email'      => 'mariomabande@gmail.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $user2 = User::create([
            'name'       => 'Vagner Edy',
            'email'      => 'vagneredy@gmail.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user3 = User::create([
            'name'       => 'Ana Margarida',
            'email'      => 'ana@gmail.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $admin = Role::where('name','admin')->first();
        $user->attachRole($admin); 
        $user2->attachRole($admin); 
        $user3->attachRole($admin); 
    }
}
