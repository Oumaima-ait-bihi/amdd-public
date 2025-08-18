<?php

namespace Database\Seeders;

use App\Models\AdhesionPaiement;
use Illuminate\Database\Seeder;

class AdhesionPaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdhesionPaiement::factory()->count(100)->create();
    }
}
