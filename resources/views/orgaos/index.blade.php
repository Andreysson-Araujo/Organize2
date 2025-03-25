@extends('layouts.main')

@section('title', 'Lista de Órgãos')

@section('content')
    <div class="container">
        <h1>Órgãos</h1>
        <a href="{{ route('orgaos.create') }}" class="btn btn-primary">Criar Novo Órgão</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orgaos as $orgao)
                    <tr>
                        <td>{{ $orgao->nome }}</td>
                        <td>
                            <a href="{{ route('orgaos.edit', $orgao->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('orgaos.destroy', $orgao->id) }}" method="POST" style="display:inline;">
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
