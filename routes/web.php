<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;

// Página inicial que exibe os últimos itens
Route::get('/', [ItemController::class, 'index']);

// Rota para criar um novo item
Route::get('/items/create', [ItemController::class, 'create']);
Route::get('/items/{id}', [ItemController::class, 'show']); 
Route::post('/items', [ItemController::class, 'store']);  

// Rotas do LocalController (CRUD)
Route::resource('locais', LocalController::class);
Route::resource('categorias', CategoriaController::class);

// Rota para buscar itens (busca por nome)
Route::get('/items', function () {
    $busca = request('search');
    return view('items', ['busca' => $busca]);
});

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
