<?php

use App\Http\Controllers\DeleteTemporalyCoverController;
use App\Http\Controllers\UploadTemporalyCoverController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'welcome');

Route::view('login', 'login')
    ->name('login');

Route::view('register', 'register')
    ->name('register');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('nueva-pelicula', 'film.store')->name('storeFilm');

Route::post('/uploadCover', UploadTemporalyCoverController::class)->name('uploadTemporalyCover');
Route::delete('/deleteCover', DeleteTemporalyCoverController::class)->name('deleteTemporalyCover');

Volt::route('watch-film', 'film.watch')->name('watchFilm');

require __DIR__ . '/auth.php';
