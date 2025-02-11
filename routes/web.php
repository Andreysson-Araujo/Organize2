<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;

// Página inicial que exibe os últimos itens
Route::get('/', function () {
    return redirect()->route('login'); // 🔥 Redireciona para a tela de login
});

// Em routes/web.php
Route::get('/welcome', [ItemController::class, 'index'])->name('welcome');



// Rota para criar um novo item
Route::get('/items/create', [ItemController::class, 'create']);
Route::get('/items/{id}', [ItemController::class, 'show']); 
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');


// Rotas do LocalController (CRUD)
Route::resource('locais', LocalController::class);
Route::resource('categorias', CategoriaController::class);

// Rota para buscar itens (busca por nome)


// 🛑 Mantendo a Autenticação
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Importa as rotas de autenticação
require __DIR__.'/auth.php';
