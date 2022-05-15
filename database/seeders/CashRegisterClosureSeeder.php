<?php

namespace Database\Seeders;

use App\Models\CashRegisterClosure;
use Illuminate\Database\Seeder;

class CashRegisterClosureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CashRegisterClosure::factory()->count(5)->create();
    }
}
