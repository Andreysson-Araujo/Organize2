@extends('layouts.main')

@section('title', 'Editar Item')

@section('content')
<div class="container">
    <h1>Editar Item: {{ $item->nome_item }}</h1>

    <!-- Formulário de edição do item -->
    <form action="{{ route('items.edit', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nome do Item -->
        <div class="form-group">
            <label for="nome_item">Nome do Item</label>
            <input type="text" class="form-control" id="nome_item" name="nome_item" value="{{ old('nome_item', $item->nome_item) }}" required>
        </div>

        <!-- Patrimônio -->
        <div class="form-group">
            <label for="patrimonio">Patrimônio</label>
            <input type="text" class="form-control" id="patrimonio" name="patrimonio" value="{{ old('patrimonio', $item->patrimonio) }}" required>
        </div>

        <!-- Quantidade -->
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade', $item->quantidade) }}" required>
        </div>

        <!-- Local -->
        <div class="form-group">
            <label for="local_id">Local</label>
            <select class="form-control" id="local_id" name="local_id" required>
                @foreach ($locais as $local)
                    <option value="{{ $local->id }}" {{ $item->local_id == $local->id ? 'selected' : '' }}>{{ $local->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="novo" {{ $item->status == 'novo' ? 'selected' : '' }}>Novo</option>
                <option value="usado" {{ $item->status == 'usado' ? 'selected' : '' }}>Usado</option>
            </select>
        </div>

        <!-- Categoria -->
        <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $item->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Botão de envio -->
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

    <!-- Link para voltar -->
    <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">Voltar para a lista</a>
</div>
@endsection
