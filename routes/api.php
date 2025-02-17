<?php

use App\Http\Controllers\API\MealController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('username', [\App\Http\Controllers\API\UserController::class, 'storeUsername']);

Route::middleware('check.name')->group(function () {
   Route::get('meals', [MealController::class, 'index']);
});

