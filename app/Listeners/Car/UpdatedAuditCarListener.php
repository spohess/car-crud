<?php

namespace App\Listeners\Car;

use App\Jobs\CarAudit\CreateCarAuditJob;
use App\Models\Car;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;

class UpdatedAuditCarListener
{
    /**
     * @param Car $car
     *
     * @return void
     *
     * @throws BindingResolutionException
     */
    public function handle(Car $car): void
    {
        $carAuditJob = app()->make(CreateCarAuditJob::class, [
            'car' => $car,
            'action' => 'updated',
            'userId' => Auth::id(),
        ]);
        dispatch($carAuditJob);
    }
}
