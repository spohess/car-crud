<?php

use App\Http\Controllers\Car\ConfirmationController;
use App\Http\Controllers\Car\CreateController;
use App\Http\Controllers\Car\EditController;
use App\Http\Controllers\Car\IndexController;
use App\Http\Controllers\Car\RemoveController;
use App\Http\Controllers\Car\SaveController;
use Illuminate\Support\Facades\Route;

Route::prefix('/car')
    ->middleware('auth')
    ->group(function () {
        Route::get(
            '/',
            IndexController::class
        )->name('car.index');

        Route::post(
            '/',
            CreateController::class
        )->name('car.create');

        Route::get(
            '/{car}/edit',
            EditController::class
        )->name('car.edit');

        Route::post(
            '/{car}/save',
            SaveController::class
        )->name('car.save');

        Route::get(
            '/{car}/confirmation',
            ConfirmationController::class
        )->name('car.confirmation');

        Route::post(
            '/{car}/remove',
            RemoveController::class
        )->name('car.remove');
    });
