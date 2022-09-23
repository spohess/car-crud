<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Services\Car\CollectCarService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     *
     * @throws BindingResolutionException
     */
    public function __invoke(): View
    {
        $context = [];
        $context['carCollect'] = app()->make(CollectCarService::class);
        return view('car.index', $context);
    }
}
