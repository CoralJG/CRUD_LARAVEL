<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
return view('auth.register');
});
Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('productos', ProductoController::class); //Para todas las rutas CRUD ->> resource
    Route::get('/detail/{id}', [ProductoController::class, 'detail'])->name('productos.detail');
});
