<?php

namespace App\Providers;

use App\Listeners\Car\CreatedAuditCarListener;
use App\Listeners\Car\DeletedAuditCarListener;
use App\Listeners\Car\UpdatedAuditCarListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as SP;

class EventServiceProvider extends SP
{
    /**
     * @var array
     */
    protected $listen = [
        'eloquent.created: App\Models\Car' => [
            CreatedAuditCarListener::class,
        ],
        'eloquent.updated: App\Models\Car' => [
            UpdatedAuditCarListener::class,
        ],
        'eloquent.deleted: App\Models\Car' => [
            DeletedAuditCarListener::class,
        ],
    ];

    /**
     * @return void
     */
    public function boot(): void
    {
    }

    /**
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
