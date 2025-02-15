<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/foro', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/ranking', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('ranking');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas exclusivas de admin 
Route::middleware(['role:admin'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('administrar.users.index');
    Route::get('/usuarios/edit', [UserController::class, 'editar'])->name('administrar.users.edit');
});

// Rutas exclusivas de editor


// Rutas exclusivas de usuario


require __DIR__.'/auth.php';
