<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Openweather;

// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');



require __DIR__.'/auth.php';
//OpenWeather
Route::get('/', Openweather::class);
// Route::get('/show', [OpenWeatherController::class, 'show']);
