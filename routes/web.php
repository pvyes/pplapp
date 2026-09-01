<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ItemController;

Route::get('/', [ChirpController::class, 'index']);
Route::get('/items', [ItemController::class, 'index']);