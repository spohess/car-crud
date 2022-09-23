<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;

class ConfirmationController extends Controller
{
    public function __invoke(Car $car)
    {
        $context = [];
        $context['car'] = $car;

        return view('car.confirmation', $context);
    }
}
