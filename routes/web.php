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

// Rotas do LocalController (Index, Create, Store)
Route::post('/locais', [LocalController::class, 'store']);
Route::get('/locais/create', [LocalController::class, 'create']);

Route::get('/locais', [LocalController::class, 'index'])->name('locais.index');
Route::get('/locais/create', [LocalController::class, 'create'])->name('locais.create');
Route::post('/locais', [LocalController::class, 'store'])->name('locais.store');
Route::get('/locais/{id}/edit', [LocalController::class, 'edit'])->name('locais.edit');
Route::put('/locais/{id}', [LocalController::class, 'update'])->name('locais.update');
Route::delete('/locais/{id}', [LocalController::class, 'destroy'])->name('locais.destroy');

Route::resource('locais', LocalController::class);



// Rota para buscar itens (busca por nome)
Route::get('/items', function () {
    $busca = request('search');
    // Certifique-se de que você tem uma view 'items' configurada
    return view('items', ['busca' => $busca]);
});
