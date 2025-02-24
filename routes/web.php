<?php

use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\Dashboard\AuthController::class)->group(function () {
    Route::get('register', 'registerView')->name('register.view');
    Route::post('register', 'register')->name('register.post');
    Route::get('/login', 'loginView')->name('login');
    Route::post('/login', 'login')->name('login.post');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Dashboard\AuthController::class, 'logout'])->name('logout');
    Route::get('', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('add-meal', [\App\Http\Controllers\Dashboard\MealController::class, 'create'])->name('dashboard.add-meal');
    Route::post('add-meal', [\App\Http\Controllers\Dashboard\MealController::class, 'store'])->name('dashboard.store-meal');
    Route::get('update-meal/{meal}', [\App\Http\Controllers\Dashboard\MealController::class, 'edit'])->name('dashboard.edit-meal');
    Route::put('update_meal/{meal}', [\App\Http\Controllers\Dashboard\MealController::class, 'update'])->name('dashboard.update-meal');
    Route::delete('delete-meal/{meal}', [\App\Http\Controllers\Dashboard\MealController::class, 'destroy'])->name('dashboard.delete-meal');
});
