@extends('layouts.main')

@section('title', 'Lista de Categorias')

@section('content')
    <div class="container">
        <h1>Categorias</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nova Categoria</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        
                        <td>{{ $categoria->nome }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
