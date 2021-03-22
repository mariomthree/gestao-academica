<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        $users = [
            'name'      => 'Mario M. Mabande',
            'email'     => 'mariomabande@gmail.com',
            'password'  => Hash::make('12345678'),
            'is_active' => 1, //Activo
            'role_id'   => 1,  //Admistrador
            'created_at'   => now(),
            'updated_at'   => now()
        ];

        User::create($users);
    }
}
