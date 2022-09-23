<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarAudit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CarAuditFactory extends Factory
{
    protected $model = CarAudit::class;

    public function definition(): array
    {
        return [
            'car_id' => Car::query()->firstOr(
                fn () => Car::factory()->create()
            ),
            'user_id' => User::query()->firstOr(
                fn () => User::factory()->create()
            ),
            'action' => $this->faker->randomElement([
                'created',
                'updated',
                'deleted',
            ]),
            'data' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
