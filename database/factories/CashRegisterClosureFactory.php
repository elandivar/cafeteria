<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CashRegisterClosure;
use App\Models\Employee;

class CashRegisterClosureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CashRegisterClosure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'amount_initial' => $this->faker->randomFloat(2, 0, 999999.99),
            'amount_cash' => $this->faker->randomFloat(2, 0, 999999.99),
            'amount_cc' => $this->faker->randomFloat(2, 0, 999999.99),
            'softdeletes' => $this->faker->word,
        ];
    }
}
