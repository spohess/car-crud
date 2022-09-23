<?php

namespace App\Listeners\Car;

use App\Jobs\CarAudit\CreateCarAuditJob;
use App\Models\Car;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;

class DeletedAuditCarListener
{
    public function __construct(private Auth $auth)
    {
    }

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
            'action' => 'deleted',
            'userId' => $this->auth->id(),
        ]);
        dispatch($carAuditJob);
    }
}
