<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('username', [\App\Http\Controllers\API\UserController::class, 'storeUsername']);


