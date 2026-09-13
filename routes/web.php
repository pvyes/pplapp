<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

//home
 Route::get('/', [PlaylistController::class, 'index'])->name('home');

//item routes
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [ItemController::class, 'show']);

//playlist routes
// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/playlist', [PlaylistController::class, 'store']);
    Route::get('/playlists/create', [PlaylistController::class, 'create']);
    Route::get('/playlists/{playlist}/edit', [PlaylistController::class, 'edit']);
    Route::put('/playlists/{playlist}', [PlaylistController::class, 'update']);
    Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy']);
});
Route::get('/playlist', [PlaylistController::class, 'index']);


// Registration routes
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
Route::post('/register', Register::class)
    ->middleware('guest');

// Login routes
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('/login', Login::class)
    ->middleware('guest');
// Logout route
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');