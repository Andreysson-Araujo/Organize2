@extends('layouts.main')

@section('title', 'Organize2.0')

@section('content')

<h1>Adicionar um item</h1>

<!-- Formulário para adicionar um item -->
<form action="{{ route('items.store') }}" method="POST">
    @csrf <!-- Token de proteção CSRF -->
    
    <label for="nome">Nome do Item:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" id="descricao" required>

    <button type="submit">Adicionar Item</button>
</form>

@endsection
