<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenWeatherController;

// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');



require __DIR__.'/auth.php';
//OpenWeather
Route::get('/', [OpenWeatherController::class, 'index']);
Route::get('/show', [OpenWeatherController::class, 'show']);
