@extends('layouts.main')

@section('title', 'Editar Local')

@section('content')
    <div id="item-create-container" class="col-md-6 offset-md-3">
        <h1>Editar Local</h1>

        <form action="{{ route('locais.update', $local->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome do Local:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $local->nome }}" required>
            </div>
          
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </form>
    </div>
@endsection
