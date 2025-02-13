@extends('layouts.main')

@section('title', 'Retiradas de Itens')

@section('content')
<div class="container">
    <h1>Retiradas de Itens</h1>


    <a href="{{ route('retiradas.create') }}" class="btn btn-primary">Nova Retirada</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantidade</th>
                <th>Retirado por</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($retiradas as $retirada)
                <tr>
                    <td>{{ $retirada->item->nome_item }}</td>
                    <td>{{ $retirada->quantidade }}</td>
                    <td>{{ $retirada->retirado_por }}</td>
                    <td>{{ $retirada->data_retirada }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
