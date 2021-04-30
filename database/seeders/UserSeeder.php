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
        $this->command->info('Truncating User table');
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        $adminUser = User::create([
            'name'       => 'super administrator',
            'email'      => 'admin@system.com',
            'password'   => Hash::make('12345678'),
            'is_active'  => 1, //active
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $super_administrator = Role::where('name', 'super_administrator')->first();
        $adminUser->attachRole($super_administrator);
    }
}
