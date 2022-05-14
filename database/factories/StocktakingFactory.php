<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Stocktaking;

class StocktakingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stocktaking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTime(),
            'comments' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'employee_id' => Employee::factory(),
            'softdeletes' => $this->faker->word,
        ];
    }
}
