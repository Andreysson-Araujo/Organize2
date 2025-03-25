<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetiradaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrgaoController;
// Página inicial que exibe os últimos itens
Route::get('/', function () {
    return redirect()->route('login'); // 🔥 Redireciona para a tela de login
});

// Em routes/web.php
//RPTA DE Dashboard Principal
Route::get('/welcome', [ItemController::class, 'welcome'])->name('welcome');



// Rota para criar um novo item
Route::get('/items/create', [ItemController::class, 'create']);
Route::get('/items/{id}', [ItemController::class, 'show']); 
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

//Route

Route::resource('orgaos', OrgaoController::class);

// Rotas do LocalController (CRUD)
Route::resource('locais', LocalController::class);
//Rotas do CategoriasController
Route::resource('categorias', CategoriaController::class);
//Rotas do RetiradaController
Route::resource('retiradas', RetiradaController::class);

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

Route::middleware(['auth', 'admin'])->prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index'); // Listar usuários
    Route::get('/create', [UserController::class, 'create'])->name('users.create'); // Formulário de criação
    Route::post('/', [UserController::class, 'store'])->name('users.store'); // Salvar usuário
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show'); // Visualizar usuário
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Formulário de edição
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update'); // Atualizar usuário
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Excluir usuário
});




// Importa as rotas de autenticação
require __DIR__.'/auth.php';
