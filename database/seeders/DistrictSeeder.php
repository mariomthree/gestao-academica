<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating districts table');
        Schema::disableForeignKeyConstraints();
        DB::table('districts')->truncate();

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
