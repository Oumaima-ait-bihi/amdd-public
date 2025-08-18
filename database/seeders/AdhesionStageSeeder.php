<?php

namespace Database\Seeders;

use App\Models\AdhesionStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdhesionStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdhesionStage::factory()->count(500)->create();
    }
}
