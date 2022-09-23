<?php

namespace App\Services\CarAudit;

use App\Models\Car;
use App\Models\CarAudit;
use App\Services\Service;
use Illuminate\Contracts\Container\BindingResolutionException;

class CreateCarAuditService implements Service
{
    /**
     * @param Car $car
     * @param string $action
     * @param int $userId
     *
     * @return void
     *
     * @throws BindingResolutionException
     */
    public function __invoke(
        Car $car,
        string $action,
        int $userId,
    ): void {
        $carAudit = app()->make(CarAudit::class);
        $carAudit->create([
            'car_id' => $car->getKey(),
            'user_id' => $userId,
            'action' => $action,
            'data' => $car,
        ]);
    }
}
