<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\SupplierRequest;
use App\Models\SupplierRequestProduct;

class SupplierRequestProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupplierRequestProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'supplier_request_id' => SupplierRequest::factory(),
            'product_id' => Product::factory(),
            'qty' => $this->faker->numberBetween(-10000, 10000),
            'unit_cost' => $this->faker->randomFloat(2, 0, 999999.99),
            'softdeletes' => $this->faker->word,
        ];
    }
}
