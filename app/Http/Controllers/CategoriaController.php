<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Categoria::create($validated);
        return redirect()->route('categorias.index')->with('msg', 'Categoria adicionada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('msg', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('msg', 'Categoria excluída com sucesso!');
    }
}
