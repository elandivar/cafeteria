<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ChartAccounts;

class ChartAccountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChartAccounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'parent' => $this->faker->numberBetween(-10000, 10000),
            'account_no' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'softdeletes' => $this->faker->word,
        ];
    }
}
