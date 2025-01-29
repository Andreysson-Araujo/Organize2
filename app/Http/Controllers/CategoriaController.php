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

        $categoria = Categoria::create($validated);
        return redirect('/')->with('msg', 'Categoria adicionada com sucesso');
    }
        public function edit($id)
        {
            $categorias = Categoria::findOrFail($id);
            return view('locais.edit', compact('local')); 
        }



  
}
