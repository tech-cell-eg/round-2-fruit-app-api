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
});
