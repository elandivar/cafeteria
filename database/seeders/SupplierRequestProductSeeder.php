<?php

namespace Database\Seeders;

use App\Models\SupplierRequestProduct;
use Illuminate\Database\Seeder;

class SupplierRequestProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierRequestProduct::factory()->count(5)->create();
    }
}
