<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/dashboard', [EventoController::class,'dashboard'])->middleware('auth')->name('eventos.dashboard');
Route::get('/eventos/create', [EventoController::class, 'create'])->middleware('auth')->name('eventos.create');
Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');
Route::post('/eventos/store', [EventoController::class, 'store'])->name('eventos.store');
Route::delete('/eventos/{id}',[EventoController::class,'destroy'])->middleware('auth')->name('eventos.delete');




  
