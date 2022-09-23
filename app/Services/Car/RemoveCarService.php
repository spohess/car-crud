<?php

namespace App\Services\Car;

use App\Models\Car;
use App\Services\Service;

class RemoveCarService implements Service
{
    /**
     * @param Car $car
     */
    public function __construct(private Car $car)
    {
    }

    /**
     * @return void
     */
    public function __invoke(): void
    {
        $this->car->delete();
    }
}
