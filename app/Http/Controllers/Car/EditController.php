<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;

class EditController extends Controller
{
    public function __invoke(Car $car)
    {
        $context = [];
        $context['car'] = $car;

        return view('car.edit', $context);
    }
}
