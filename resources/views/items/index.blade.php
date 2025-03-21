@extends('layouts.main')

@section('title', 'Organize2.0 - Itens')

@section('content')
    <div class="container">
        <h1>Itens</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome do Item</th>
                    <th>Patrimônio</th>
                    <th>Quantidade</th>
                    <th>Local</th>
                    <th>Status</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->nome_item }}</td>
                        <td>{{ $item->patrimonio ?? 'Não tem' }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>{{ $item->local->nome ?? 'N/A' }}</td> <!-- Exibindo nome do local -->
                        <td>{{ ucfirst($item->status) }}</td>
                        <td>{{ $item->categoria->nome ?? 'N/A' }}</td> <!-- Exibindo nome da categoria -->
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{route('items.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este Item?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
