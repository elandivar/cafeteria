<?php

namespace Database\Seeders;

use App\Models\StocktakingProduct;
use Illuminate\Database\Seeder;

class StocktakingProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StocktakingProduct::factory()->count(5)->create();
    }
}
