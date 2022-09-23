<?php

namespace App\Jobs\CarAudit;

use App\Models\Car;
use App\Services\CarAudit\CreateCarAuditService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCarAuditJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private Car $car,
        private string $action,
        private int $userId
    ) {
    }

    /**
     * @return void
     *
     * @throws BindingResolutionException
     */
    public function handle(): void
    {
        $carAudit = app()->make(CreateCarAuditService::class);
        $carAudit($this->car, $this->action, $this->userId);
    }
}
