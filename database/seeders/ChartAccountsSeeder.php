<?php

namespace Database\Seeders;

use App\Models\ChartAccounts;
use Illuminate\Database\Seeder;

class ChartAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChartAccounts::factory()->count(5)->create();
    }
}
