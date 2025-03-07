@extends('layouts.main')

@section('title', 'Detalhes do Usuário')

@section('content')
<div class="container">
    <h1>Detalhes do Usuário</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Username:</strong> {{ $user->username }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Administrador:</strong> {{ $user->is_admin ? 'Sim' : 'Não' }}</p>
            <p class="card-text"><strong>Criado em:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text"><strong>Última atualização:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
        </form>
    </div>
</div>
@endsection
