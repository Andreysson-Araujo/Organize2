<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;

// Página inicial que exibe os últimos itens
Route::get('/', [ItemController::class, 'index']);

// Rota para criar um novo item
Route::get('/items/create', [ItemController::class, 'create']);

// Exibir um item específico (detalhes do item)
Route::get('/items/{id}', [ItemController::class, 'show']); 

// Salvar um novo item
Route::post('/items', [ItemController::class, 'store']);  

Route::get('/locais', LocalController::class);

Route::get('/locais/create', [ItemController::class, 'create']);

// Rota para buscar itens (busca por nome)
Route::get('/items', function () {
    $busca = request('search');
    // Certifique-se de que você tem uma view 'items' configurada
    return view('items', ['busca' => $busca]);
});
