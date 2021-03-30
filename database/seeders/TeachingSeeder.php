<?php

namespace Database\Seeders;

use App\Models\Teaching;
use Illuminate\Database\Seeder;

class TeachingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachings = [
            'Ensino Primário',
            'Ensino Secundário',
            'Ensino Pré-universitário'
        ];

        foreach ($teachings as $teaching) 
            Teaching::create(['name' => $teaching]);
    }
}
