<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = [
            'Escola Secundaria Eduardo Mondlane',
            'Escola Secundaria Francisco Manyanga',
            'Escola Secundaria Estrela Vermelha',
            'Escola Secundaria 16 de Junho',
            'Escola Secundaria Josina Machel',
            'Escola Secundaria Noroeste 1',
            'Escola Secundaria Polana',
            'Escola Secundaria Malhazine',
            'Escola Secundaria Lhanguene',
            'Escola Secundaria Quisse Mavota',
            'Escola Primaria Completa Triunfo',
            'Escola Primaria 3 de Fevereiro',
            'Escola Secundaria Quisse Mavota'
        ];
        
    }
}
