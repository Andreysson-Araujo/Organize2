<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Certifique-se de importar o modelo correspondente

class ItemController extends Controller
{
    public function index() {
        // Recupera todos os itens do banco de dados
          // Buscar os últimos 3 itens adicionados
        $recentItems = Item::orderBy('created_at', 'desc')->take(3)->get();

        // Passar a variável para a view
        return view('welcome', compact('recentItems'));
    }

    public function create() {
        // Retorna a view para criar um novo item
        return view('items.create');
    }

    public function store(Request $request) {
        // Valida os dados do formulário
        $validatedData = $request->validate([
            'nome_item' => 'required|string|max:255',
            'patrimonio' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'local'=>'required|string|max:255',
            'marca' => 'required|string|max:255',
        ]);

        // Cria uma nova instância do modelo Item e salva os dados
        $item = new Item;
        $item->nome_item = $request->input('nome_item');
        $item->patrimonio = $request->input('patrimonio');
        $item->quantidade = $request->input('quantidade');
        $item->status = $request->input('status');
        $item->categoria = $request->input('categoria');
        $item->local=$request->input('local');
        $item->marca = $request->input('marca');
        $item->save();

        // Redireciona para a página inicial com uma mensagem de sucesso
        return redirect('/')->with('msg', 'Item criado com sucesso!');
    }
}
