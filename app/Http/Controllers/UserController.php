<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Lista todos os usuários
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        return view('users.create');
    }

    // Armazena um novo usuário
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin') ? 1 : 0, // Checkbox marcado define como administrador
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    // Exibe um usuário específico
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Atualiza um usuário existente
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'is_admin' => $request->has('is_admin') ? 1 : 0,
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Exclui um usuário
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
