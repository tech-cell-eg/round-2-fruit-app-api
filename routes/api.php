<?php

use App\Http\Controllers\API\MealController;
use App\Http\Controllers\API\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BasketController;
use App\Http\Controllers\API\UserController;

Route::post('username', [UserController::class, 'store']);

Route::middleware('check.name')->group(function () {
   Route::get('meals', [MealController::class, 'index']);

   Route::post('basket', [BasketController::class, 'store']);

   Route::delete('basket', [BasketController::class, 'removeMeal']);

   Route::put('info', [UserController::class, 'update']);

   Route::post('payment', [PaymentController::class, 'store']);

});
