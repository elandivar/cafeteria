<?php

namespace Database\Seeders;

use App\Models\AccountTransactions;
use Illuminate\Database\Seeder;

class AccountTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountTransactions::factory()->count(5)->create();
    }
}
