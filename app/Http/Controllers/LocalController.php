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

        return redirect('/')->with('msg', 'Item criado com sucesso!'); 
       }
  
}
