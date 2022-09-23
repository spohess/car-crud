<?php

namespace App\Services\Car;

use App\Models\Car;
use App\Services\Service;

class EditCarService implements Service
{
    /**
     * @param Car $car
     */
    public function __construct(private Car $car)
    {
    }

    /**
     * @param string $brand
     * @param string $model
     * @param int $year
     * @param int $manufactured
     * @param string $plate
     *
     * @return void
     */
    public function __invoke(
        string $brand,
        string $model,
        int $year,
        int $manufactured,
        string $plate
    ): void {
        $this->car->update([
            'brand' => $brand,
            'model' => $model,
            'year' => $year,
            'manufactured' => $manufactured,
            'plate' => strtoupper($plate),
        ]);
    }
}
