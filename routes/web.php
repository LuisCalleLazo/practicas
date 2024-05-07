<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\LunchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/persona', function () {
//     return "Hola";
// });
// Route::get('/persona/{persona}', function ($persona) {
//     return "Hola: $persona";
// });
// Route::get('/persona/{persona}/{apellido?}', function ($persona, $apellido = null) {
//     return "Hola: $persona, $apellido. Prueba de que funciona";
// });



// Route::get('/personas', [PersonaController::class, 'index']);
// Route::get('/personas/create', [PersonaController::class, 'create']);
// Route::get('/personas/{persona}', [PersonaController::class, 'show']);
Route::get('/', InicioController::class);

Route::controller(PersonaController::class )->group(function(){

    Route::get('/personas',  'index');
    Route::get('/personas/create', 'create');
    Route::get('/personas/{persona}', 'show');
});

Route::get('/lunch', [LunchController::class, 'index'])->name('lunch.index');
Route::post('/lunch', [LunchController::class, 'store'])->name('lunch.store');
Route::put('/lunch/{id}', [LunchController::class, 'update'])->name('lunch.update');
Route::delete('/lunch/{id}', [LunchController::class, 'delete'])->name('lunch.delete');

Route::get('/lunch/create', [LunchController::class, 'create'])->name('lunch.create');
Route::get('/lunch/show/{id}', [LunchController::class, 'show'])->name('lunch.show');
