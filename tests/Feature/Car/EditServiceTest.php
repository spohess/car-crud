<?php

namespace Tests\Feature\Car;

use App\Models\Car;
use App\Services\Car\EditCarService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use TypeError;

class EditServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function testEditCarWithAnyInformation(): void
    {
        Event::fake();

        $brand = $this->faker->word();
        $car = Car::factory()->create([
            'brand' => $brand
        ]);

        $editCar = app()->make(EditCarService::class, [
            'car' => $car,
        ]);
        $newBrand = $this->faker->word() . $this->faker->word();
        $editCar(
            $newBrand,
            $this->faker->word(),
            $this->faker->numberBetween(1886, 2886),
            $this->faker->numberBetween(1886, 2886),
            $this->faker->word()
        );

        $this->assertEquals($car->brand, $newBrand);
    }

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function testGetErrorWhenCreateCarWithouBrand(): void
    {
        Event::fake();

        $this->expectException(TypeError::class);

        $createCar = app()->make(EditCarService::class);
        $createCar(
            null,
            $this->faker->word(),
            $this->faker->numberBetween(1886, 2886),
            $this->faker->numberBetween(1886, 2886),
            $this->faker->word()
        );
    }
}
