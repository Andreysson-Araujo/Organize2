<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Local;

class ItemController extends Controller
{
    /**
     * Exibe a página inicial com os itens mais recentes.
     */
    public function index()
    {
        $items = Item::with(['local', 'categoria'])->latest()->get();

        return view('items.index', compact('items'));
    }

    /**
     * Exibe o formulário para criar um novo item.
     */
    public function create()
    {
        // Recupera todos os locais disponíveis para o dropdown
        $locais = Local::all();
        $categorias = Categoria::all();

        // Retorna a view de criação de itens com os locais disponíveis
        return view('items.create', compact('locais', 'categorias'));
    }

    /**
     * Armazena um novo item no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados enviados pelo formulário
        $validatedData = $request->validate([
            'nome_item' => 'required|string|max:255',
            'patrimonio' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categoria,id', // Garante que a categoria exista
            'local_id' => 'required|exists:locais,id', // Garante que o local selecionado exista
        ]);

        // Criação de um novo item com os dados validados
        $item = Item::create($validatedData);

        // Redireciona para a página inicial com uma mensagem de sucesso e o item recém-criado
        return redirect()->route('welcome')->with('msg', 'Item Adicionado com sucesso!');
    }
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $locais = Local::all();
        $categorias = Categoria::all();

        return view('items.edit', compact('item', 'locais', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome_item' => 'required|string|max:255',
            'patrimonio' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'local_id' => 'required|exists:locais,id',
            'status' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categoria,id',
        ]);

        $item = Item::findOrFail($id);
        $item->update($validated);

        return redirect()->route('items.index')->with('msg', 'Item atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('msg', 'Item deletado com sucesso');
    }
}
