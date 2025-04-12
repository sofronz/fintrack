<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'store'])->name('transactions.store');
Route::delete('/{code}', [HomeController::class, 'destroy'])->name('transactions.delete');
