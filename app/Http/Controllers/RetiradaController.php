<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retirada;
use App\Models\Item;

class RetiradaController extends Controller
{
    public function index()
    {
        $retiradas = Retirada::with('item')->latest()->get();
        return view('retiradas.index', compact('retiradas'));
    }
    public function create()
    {
        $items = Item::all();
        return view('retiradas.create', compact('items'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantidade' => 'required|integer|min:1',
            'retirado_por' => 'required|string|max:255',
            'data_retirada' => 'required|date',
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($item->quantidade < $request->quantidade) {
            return redirect()->back()->with('msg_e', 'Quantidade insuficiente para retirada.');
        }

        // Criar a retirada
        Retirada::create($request->all());

        // Atualizar quantidade do item
        $item->decrement('quantidade', $request->quantidade);

        return redirect()->route('retiradas.index')->with('msg', 'Item retirado com sucesso!');
    }
}
