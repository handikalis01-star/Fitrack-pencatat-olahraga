<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OlahragaController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

 
    Route::get('/olahragas', [OlahragaController::class, 'index'])->name('olahragas.index');
    Route::get('/olahragas/create', [OlahragaController::class, 'create'])->name('olahragas.create');
    Route::post('/olahragas', [OlahragaController::class, 'store'])->name('olahragas.store');
    Route::get('/olahragas/{olahraga}/edit', [OlahragaController::class, 'edit'])->name('olahragas.edit');
    Route::put('/olahragas/{olahraga}', [OlahragaController::class, 'update'])->name('olahragas.update');

    Route::delete('/olahragas/{olahraga}', [OlahragaController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('olahragas.destroy');
});