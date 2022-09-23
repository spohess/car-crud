<?php

namespace App\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * @return void
     *
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $broadcast = app()->make(Broadcast::class);
        $broadcast::routes();

        require base_path('routes/channels.php');
    }
}
