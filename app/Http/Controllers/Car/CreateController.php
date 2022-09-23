<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarRequest;
use App\Services\Car\CreateCarService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;

class CreateController extends Controller
{
    /**
     * @param CreateCarRequest $request
     *
     * @return RedirectResponse
     *
     * @throws BindingResolutionException
     */
    public function __invoke(CreateCarRequest $request): RedirectResponse
    {
        $createCar = app()->make(CreateCarService::class);
        $createCar(
            $request->brand,
            $request->model,
            $request->year,
            $request->manufactured,
            $request->plate
        );

        return redirect(route('car.index'));
    }
}
