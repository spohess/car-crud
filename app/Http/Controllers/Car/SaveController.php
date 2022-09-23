<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditCarRequest;
use App\Models\Car;
use App\Services\Car\EditCarService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class SaveController extends Controller
{
    /**
     * @param Car $car
     * @param EditCarRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     *
     * @throws BindingResolutionException
     */
    public function __invoke(Car $car, EditCarRequest $request)
    {
        $editCar = app()->make(EditCarService::class, [
            'car' => $car,
        ]);
        $editCar(
            $request->brand,
            $request->model,
            $request->year,
            $request->manufactured,
            $request->plate
        );

        return redirect(route('car.index'));
    }
}
