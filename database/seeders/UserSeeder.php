<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating User tables');
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        $user = User::create([
            'name'       => 'super administrator',
            'email'      => 'admin@gmail.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user2 = User::create([
            'name'       => 'Ministry Education',
            'email'      => 'meducation@gmail.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $superadministrator = Role::where('name', 'super_administrator')->first();
        $meducation = Role::where('name', 'ministry_education')->first();

        $user->attachRole($superadministrator);
        $user2->attachRole($meducation);
    }
}
