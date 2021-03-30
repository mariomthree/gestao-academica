<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            'KaMpfumo',
            'Nlhamankulu',
            'KaMaxaquene',
            'KaMavota',
            'KaMubukwana',
            'KaTembe',
            'KaNyaka'
        ];

        foreach ($districts as $district) 
            District::create([
                'name' => $district,
                'province_id' => 1 //Maputo Cidade
            ]);
    }
}
