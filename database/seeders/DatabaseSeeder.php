<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\Province;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            InternshipsSeeder::class,
            InstitutionSeeder::class
        ]);
    }
}
