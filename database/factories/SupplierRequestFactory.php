<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Supplier;
use App\Models\SupplierRequest;

class SupplierRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupplierRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'supplier_id' => Supplier::factory(),
            'order_date' => $this->faker->dateTime(),
            'received_at' => $this->faker->dateTime(),
            'employee_id' => Employee::factory(),
            'softdeletes' => $this->faker->word,
        ];
    }
}
