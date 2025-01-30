@extends('layouts.main')

@section('title', 'Organize2.0 - Adicionar Categoria')

@section('content')

<div id="ite,-create-container" class="col-md-6 offset-md-3" >
    <h1>Adicionar Categoria</h1>
    <form action="/categorias" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome"> Nome da Categoria:</label>
            <input type="" class="form-control" id="nome" name="nome" placeholder="nome da categoria">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

@endsection