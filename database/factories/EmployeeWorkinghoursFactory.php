<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\Employee_workinghours;

class EmployeeWorkinghoursFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeWorkinghours::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'weekday' => $this->faker->numberBetween(-10000, 10000),
            'daytime_start' => $this->faker->time(),
            'daytime_end' => $this->faker->time(),
            'softdeletes' => $this->faker->word,
        ];
    }
}
