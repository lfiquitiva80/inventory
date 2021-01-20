<?php

namespace Database\Seeders;

use App\Models\Eradication;
use Illuminate\Database\Seeder;

class EradicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eradication::factory()->count(5)->create();
    }
}
