<?php

namespace Database\Seeders;

use App\Models\Internships;
use Illuminate\Database\Seeder;

class InternshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $internships = [
            'Ensino Primário',
            'Ensino Secundário',
            'Ensino Pré-universitário'
        ];

        foreach ($internships as $internship) 
            Internships::create(['name' => $internship]);
    }
}
