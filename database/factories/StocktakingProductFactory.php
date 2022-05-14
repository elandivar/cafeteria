<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Stocktaking;
use App\Models\StocktakingProduct;

class StocktakingProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StocktakingProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stocktaking_id' => Stocktaking::factory(),
            'product_id' => Product::factory(),
            'qty' => $this->faker->numberBetween(-10000, 10000),
            'softdeletes' => $this->faker->word,
        ];
    }
}
