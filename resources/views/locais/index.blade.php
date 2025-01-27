@extends('layouts.app')

@section('content')
    <h1>Locais</h1>
    <a href="{{ route('locais.create') }}">Adicionar Novo Local</a>
    <ul>
        @foreach($locais as $local)
            <li>
                {{ $local->nome }}
                <a href="{{ route('locais.edit', $local->id) }}">Editar</a>
                <form action="{{ route('locais.destroy', $local->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
