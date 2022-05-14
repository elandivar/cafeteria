<?php

namespace Database\Seeders;

use App\Models\Stocktaking;
use Illuminate\Database\Seeder;

class StocktakingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stocktaking::factory()->count(5)->create();
    }
}
