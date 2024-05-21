<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SaleController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sale', [SaleController::class, 'store'])->name('sale.store');
Route::delete('/sale/{id}', [SaleController::class, 'delete'])->name('sale.delete');
Route::put('/sale/{id}', [SaleController::class, 'update'])->name('sale.update');
