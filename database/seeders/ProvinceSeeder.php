<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating provinces table');
        Schema::disableForeignKeyConstraints();
        DB::table('provinces')->truncate();

        $provinces = [
            'Maputo Cidade',
            'Maputo',
            'Gaza',
            'Inhambane',
            'Sofala',
            'Manica',
            'Tete',
            'Zambezia',
            'Nampula',
            'Niassa',
            'Cabo Delgado'
        ];

        foreach ($provinces as $province) 
            Province::create(['name' => $province]);
    }
}
