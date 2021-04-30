<?php

namespace Database\Seeders;

use App\Models\Internships;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InternshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating internships table');
        Schema::disableForeignKeyConstraints();
        DB::table('internships')->truncate();

        $internships = [
            'Primário',
            'Secundário',
            'Pré-universitário'
        ];

        foreach ($internships as $internship) 
            Internships::create(['name' => $internship]);
    }
}
