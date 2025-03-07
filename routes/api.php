<?php

use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get-data', [DataController::class, 'getData']);
Route::any('/create-data', [DataController::class, 'create']);

Route::any('humidite', [DataController::class, 'humidite'])->name('humidite');
Route::any('temperature', [DataController::class, 'temperature'])->name('temperature');
Route::any('pollution', [DataController::class, 'pollution'])->name('pollution');
Route::any('lumiere', [DataController::class, 'lumiere'])->name('lumiere');
