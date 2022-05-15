<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AccountTransactions;
use App\Models\Chart;

class AccountTransactionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountTransactions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'chart_id' => Chart::factory(),
            'date_transaction' => $this->faker->dateTime(),
            'amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'debit' => $this->faker->word,
            'softdeletes' => $this->faker->word,
        ];
    }
}
