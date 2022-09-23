<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    /**
     * @var Car
     */
    protected $model = Car::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->word(),
            'model' => $this->faker->word(),
            'year' => $this->faker->numberBetween(1886, 2886),
            'manufactured' => $this->faker->numberBetween(1886, 2886),
            'plate' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
