<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Services\Car\RemoveCarService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RemoveController extends Controller
{
    /**
     * @param Car $car
     *
     * @return Application|RedirectResponse|Redirector
     *
     * @throws BindingResolutionException
     */
    public function __invoke(Car $car)
    {
        $removeCar = app()->make(RemoveCarService::class, [
            'car' => $car,
        ]);
        $removeCar();
        return redirect(route('car.index'));
    }
}
