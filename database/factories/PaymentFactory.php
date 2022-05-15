<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Chartaccount;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Supplier;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTime(),
            'employee_id' => Employee::factory(),
            'supplier_id' => Supplier::factory(),
            'chartaccount_id' => Chartaccount::factory(),
            'amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'docref' => $this->faker->regexify('[A-Za-z0-9]{200}'),
            'note' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'softdeletes' => $this->faker->word,
        ];
    }
}
