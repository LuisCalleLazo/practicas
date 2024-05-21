<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\LunchController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PersonaController;

Route::get('/', InicioController::class);


Route::get('/lunch', [LunchController::class, 'index'])->name('lunch.index');
Route::post('/lunch', [LunchController::class, 'store'])->name('lunch.store');
Route::put('/lunch/{id}', [LunchController::class, 'update'])->name('lunch.update');
Route::delete('/lunch/{id}', [LunchController::class, 'delete'])->name('lunch.delete');

Route::get('/lunch/create', [LunchController::class, 'create'])->name('lunch.create');
Route::get('/lunch/show/{id}', [LunchController::class, 'show'])->name('lunch.show');


Route::get('/sale', [SaleController::class, 'index'])->name('sale.index');
