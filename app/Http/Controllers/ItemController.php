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

        public function welcome()
    {
        $recentItems = Item::with(['local', 'categoria'])->latest()->take(6)->get(); 

        $consumoItems = Item::with(['local', 'categoria'])
                            ->whereHas('categoria', function ($query) {
                                $query->whereIn('nome', ['Papel A4', 'Bobina']);
                            })
                            ->get();
        
        return view('welcome', compact('recentItems', 'consumoItems'));
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
        try {
            // Validação dos dados enviados pelo formulário
            $validatedData = $request->validate([
                'nome_item' => 'required|string|max:255',
                'patrimonio' => 'nullable|required_if:tem_patrimonio,sim|string|max:255|unique:items,patrimonio',
                'quantidade' => ['required', 'integer', 'min:1', function ($attribute, $value, $fail) use ($request) {
                    if ($request->tem_patrimonio === 'sim' && $value != 1) {
                        $fail('Se o item tiver patrimônio, a quantidade deve ser 1.');
                    }
                }],
                'status' => 'required|string|max:255',
                'categoria_id' => 'required|exists:categoria,id',
                'local_id' => 'required|exists:locais,id',
            ]);
    
            // Criação de um novo item com os dados validados
            Item::create($validatedData);
    
            // Redireciona para a página inicial com uma mensagem de sucesso
            return redirect()->route('welcome')->with('msg', 'Item Adicionado com sucesso!');
        } catch (\Exception $e) {
            // Caso ocorra qualquer erro, retorna com uma mensagem de erro
            return redirect()->route('welcome')->with('msg_e', 'Error, patrimonio ja existe!');
        }
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

    public function edit($id)
{
    $item = Item::findOrFail($id);
    $locais = Local::all();
    $categorias = Categoria::all();

    return view('items.edit', compact('item', 'locais', 'categorias'));
}


    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('msg', 'Item deletado com sucesso');
    }
}
