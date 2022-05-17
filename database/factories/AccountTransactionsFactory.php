<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AccountTransactions;
use App\Models\Chartaccount;

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
            'chartaccount_id' => Chartaccount::factory(),
            'date_transaction' => $this->faker->dateTime(),
            'amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'debit' => $this->faker->word,
            'note' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'softdeletes' => $this->faker->word,
        ];
    }
}
