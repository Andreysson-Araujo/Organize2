<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; 
use App\Models\Local;

class ItemController extends Controller
{
    public function index()
    {
        $recentItems = Item::orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('recentItems'));
    }

    public function create()
    {
        // Recupera todos os locais do banco de dados
        $locais = Local::all();

        // Retorna a view com os locais
        return view('items.create', compact('locais'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome_item' => 'required|string|max:255',
            'patrimonio' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'local_id' => 'required|exists:locais,id', // Valida se o local existe
            'marca' => 'required|string|max:255',
        ]);

        $item = new Item;
        $item->nome_item = $request->input('nome_item');
        $item->patrimonio = $request->input('patrimonio');
        $item->quantidade = $request->input('quantidade');
        $item->status = $request->input('status');
        $item->categoria = $request->input('categoria');
        $item->local_id = $request->input('local_id'); // Salva o local_id corretamente
        $item->marca = $request->input('marca');
        $item->save();

        return redirect('/')->with('msg', 'Item criado com sucesso!');
    }
}