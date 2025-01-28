@extends('layouts.main')

@section('title', 'Organize2.0 - Adicionar Item')

@section('content')

<div id="item-create-container" class="col-md-6 offset-md-3">

    <h1>Adicionar Novo Local</h1>
    <form action="/locais" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome" >Nome do Local:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do local" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
