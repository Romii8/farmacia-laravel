<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AsistenteFarmaciaController;


Route::get('/', function () {
    return view('welcome-farmacia'); 
});

Route::get('/dashboard', [ProductoController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/comprar', [CompraController::class, 'confirmar'])->middleware('auth');
Route::get('/mis-compras', [CompraController::class, 'misCompras'])->middleware('auth');

Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])
    ->middleware('auth')
    ->name('carrito.agregar');

Route::get('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])
    ->middleware('auth');

Route::get('/factura', function () {
    if (!session()->has('factura')) {
        return redirect('/dashboard');
    }
    return view('compra.factura');
})->middleware('auth');

Route::get('/factura-pdf', [PdfController::class, 'generar'])
    ->middleware('auth');


require __DIR__.'/auth.php';

Route::match(['get', 'post'], '/ia-farmacia', [AsistenteFarmaciaController::class, 'responder']);



