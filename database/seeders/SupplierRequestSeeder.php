<?php

namespace Database\Seeders;

use App\Models\SupplierRequest;
use Illuminate\Database\Seeder;

class SupplierRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierRequest::factory()->count(5)->create();
    }
}
