<?php

namespace Database\Seeders;

use App\Models\AdhesionFormation;
use App\Models\AdhesionPaiement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdhesionFormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdhesionFormation::factory()->count(200)->create();
    }
}
