@extends('layouts.main')
@section('content')
    <h2>Editar Orgão</h2>
    <form action="{{ route('orgaos.update', $orgao->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome do Órgão:</label>
        <input type="text" name="nome" value="{{ $orgao->nome }}" required>
        <button type="submit">Atualizar</button>
    </form>
@endsection