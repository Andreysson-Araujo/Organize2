<?php
    
namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index()
    {
        $locais = Local::all();
        return view('locais.index', compact('locais'));
    }

    // Exibe o formulário de criação de locais
    public function create()
    {
        return view('locais.create');
    }

    // Salva um novo local no banco de dados
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $local = Local::create($validated);

        return redirect('/')->with('msg', 'Local adicionado com sucesso!'); 
       }

       public function edit($id)
{
    $local = Local::findOrFail($id);
    return view('locais.edit', compact('local'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string|max:255',
    ]);

    $local = Local::findOrFail($id);
    $local->update($request->all());

    return redirect()->route('locais.index')->with('msg', 'Local atualizado com sucesso!');
}

public function destroy($id)
{
    $local = Local::findOrFail($id);
    $local->delete();

    return redirect()->route('locais.index')->with('msg', 'Local excluído com sucesso!');
}

  
}
