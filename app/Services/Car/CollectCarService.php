<?php

namespace App\Services\Car;

use App\Models\Car;
use App\Services\Service;
use Illuminate\Contracts\Container\BindingResolutionException;

class CollectCarService implements Service
{
    /**
     * @throws BindingResolutionException
     */
    public function all()
    {
        $car = app()->make(Car::class);
        return $car->orderBy('created_at')->get();
    }
}
