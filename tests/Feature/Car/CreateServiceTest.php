<?php

namespace Tests\Feature\Car;

use App\Models\Car;
use App\Services\Car\CreateCarService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use TypeError;

class CreateServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function testCreateCarWithAllData(): void
    {
        Event::fake();

        $createCar = app()->make(CreateCarService::class);
        $createCar(
            $this->faker->word(),
            $this->faker->word(),
            $this->faker->numberBetween(1886, 2886),
            $this->faker->numberBetween(1886, 2886),
            $this->faker->word()
        );

        $this->assertDatabaseCount(Car::class, 1);
    }

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function testGetErrorWhenCreateCarWithouBrand(): void
    {
        Event::fake();

        $this->expectException(TypeError::class);

        $createCar = app()->make(CreateCarService::class);
        $createCar(
            null,
            $this->faker->word(),
            $this->faker->numberBetween(1886, 2886),
            $this->faker->numberBetween(1886, 2886),
            $this->faker->word()
        );
    }
}
