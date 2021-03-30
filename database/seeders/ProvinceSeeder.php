<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
