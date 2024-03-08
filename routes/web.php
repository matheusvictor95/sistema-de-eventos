<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/dashboard', [EventoController::class,'dashboard'])->middleware('auth')->name('eventos.dashboard');
Route::get('/eventos/create', [EventoController::class, 'create'])->middleware('auth')->name('eventos.create');
Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');
Route::get('/eventos/edit/{id}', [EventoController::class, 'edit'])->middleware('auth')->name('eventos.edit');
Route::put('/eventos/update/{id}',[EventoController::class,'update'])->middleware('auth')->name('eventos.update');
Route::post('/eventos/store', [EventoController::class, 'store'])->name('eventos.store');
Route::delete('/eventos/{id}',[EventoController::class,'destroy'])->middleware('auth')->name('eventos.delete');
Route::post('/eventos/join/{id}', [EventoController::class, 'joinEvent'])->middleware('auth')->name('eventos.join');
Route::delete('/eventos/leave/{id}', [EventoController::class, 'leaveEvent'])->middleware('auth')->name('eventos.leave');



  
