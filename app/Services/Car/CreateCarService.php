<?php

namespace App\Services\Car;

use App\Models\Car;
use App\Services\Service;
use Illuminate\Contracts\Container\BindingResolutionException;

class CreateCarService implements Service
{
    /**
     * @param string $brand
     * @param string $model
     * @param int $year
     * @param int $manufactured
     * @param string $plate
     *
     * @return void
     *
     * @throws BindingResolutionException
     */
    public function __invoke(
        string $brand,
        string $model,
        int $year,
        int $manufactured,
        string $plate
    ): void {
        $car = app()->make(Car::class);
        $car->create([
            'brand' => $brand,
            'model' => $model,
            'year' => $year,
            'manufactured' => $manufactured,
            'plate' => strtoupper($plate),
        ]);
    }
}
