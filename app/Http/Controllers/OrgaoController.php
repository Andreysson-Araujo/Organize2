<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orgao;

class OrgaoController extends Controller
{
    public function index()
    {
        $orgaos = Orgao::all();
        return view('orgaos.index', compact('orgaos'));
    }

    public function create()
    {
        return view('orgaos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:orgaos|max:255',
        ]);

        Orgao::create(['nome' => $request->nome]);

        return redirect()->route('orgaos.index')->with('success', 'Órgão cadastrado com sucesso!');
    }

    public function edit(Orgao $orgao)
    {
        return view('orgaos.edit', compact('orgao'));
    }

    public function update(Request $request, Orgao $orgao)
    {
        $request->validate([
            'nome' => 'required|unique:orgaos,nome,' . $orgao->id . '|max:255',
        ]);

        $orgao->update(['nome' => $request->nome]);

        return redirect()->route('orgaos.index')->with('success', 'Órgão atualizado com sucesso!');
    }

    public function destroy(Orgao $orgao)
    {
        $orgao->delete();

        return redirect()->route('orgaos.index')->with('success', 'Órgão removido com sucesso!');
    }
}