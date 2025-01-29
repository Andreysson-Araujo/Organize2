@extends('layouts.main')

@section('title', 'Organize2.0 - Locais')

@section('content')
    <div class="container">
        <h1>Locais</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Local</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locais as $local)
                    <tr>
                        <td>{{ $local->nome }}</td>
                        <td>
                            <a href="{{ route('locais.edit', $local->id) }}" class="btn btn-warning">Editar</a>
                            
                            <form action="{{ route('locais.destroy', $local->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este local?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/locais/create" class="btn btn-success">Adicionar novo Local</a>
    </div>
@endsection
