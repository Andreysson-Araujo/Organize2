@extends('layouts.main')

@section('title', 'Nova Retirada')

@section('content')
<div class="container">
    <h1>Registrar Retirada de Item</h1>

    <form action="{{ route('retiradas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="item_id" class="form-label">Item</label>
            <select name="item_id" id="item_id" class="form-control" required>
                <option value="">Selecione um item</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->nome_item }} (Disponível: {{ $item->quantidade }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" required min="1">
        </div>

        <div class="mb-3">
            <label for="retirado_por" class="form-label">Retirado por</label>
            <input type="text" name="retirado_por" id="retirado_por" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data_retirada" class="form-label">Data</label>
            <input type="date" name="data_retirada" id="data_retirada" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Registrar Retirada</button>
    </form>
</div>
@endsection
