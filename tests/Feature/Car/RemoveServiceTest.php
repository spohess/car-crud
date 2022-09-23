<?php

namespace Tests\Feature\Car;

use App\Models\Car;
use App\Services\Car\RemoveCarService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class RemoveServiceTest extends TestCase
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

        $car = Car::factory()->create();
        $removeCar = app()->make(RemoveCarService::class, [
            'car' => $car,
        ]);
        $removeCar();

        $this->assertNotNull($car->deleted_at);
    }
}
