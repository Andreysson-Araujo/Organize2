@extends('layouts.app')

@section('content')
    <h1>Editar Local</h1>
    <form action="{{ route('locais.update', $local->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome do Local:</label>
        <input type="text" name="nome" id="nome" value="{{ $local->nome }}" required>
        <button type="submit">Atualizar</button>
    </form>
@endsection
