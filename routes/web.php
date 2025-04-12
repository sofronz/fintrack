<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'store'])->name('transactions.store');
Route::get('/chart-data', [HomeController::class, 'chartData'])->name('transactions.chart-data');
Route::delete('/{code}', [HomeController::class, 'destroy'])->name('transactions.delete');
