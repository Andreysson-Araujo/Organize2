@extends('layouts.app')

@section('content')
    <h1>Adicionar Novo Local</h1>
    <form action="{{ route('locais.store') }}" method="POST">
        @csrf
        <label for="nome">Nome do Local:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Salvar</button>
    </form>
@endsection
