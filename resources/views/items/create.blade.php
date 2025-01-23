@extends('layouts.main')

@section('title', 'Organize2.0 - Adicionar Item')

@section('content')



<!-- Formulário para adicionar um item -->
<div id="item-create-container" class="col-md-6 offset-md-3">
    <h1>Adicionar Item</h1>
    <form action="/items" method="POST">
        @csrf <!-- Token CSRF obrigatório -->
        <div class="form-group">
            <label for="nome_item">Nome do item:</label>
            <input type="text" class="form-control" id="nome_item" name="nome_item" placeholder="Nome do item" required>
        </div>
        <div class="form-group">
            <label for="patrimonio">Patrimônio:</label>
            <input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="Código do patrimônio" required>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade do item" required>
        </div>
        <div class="form-group">
            <label for="local">Selecione o Local</label>
<select id="local" name="local_id" class="form-control">
    <option value="">Selecione um local</option>
    @foreach($locais as $local)
        <option value="{{ $local->id }}">{{ $local->nome }}</option>
    @endforeach
</select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="novo">Novo</option>
                <option value="usado">Usado</option>
                <option value="danificado">Danificado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria do item" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca do item" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

@endsection
