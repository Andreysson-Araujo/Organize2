<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', [ItemController::class, 'index']);
Route::get('/items/create', [ItemController::class, 'create']);
Route::post('/items', [ItemController::class, 'store']);  // Aqui está a rota store

Route::get('/items', function () {
    $busca = request('search');
    return view('items', ['busca' => $busca]);
});

Route::get('/items/{id}', function ($id) {
    return view('item', ['id' => $id]);
});

Route::get('/', function () {
    return view('welcome');
});
