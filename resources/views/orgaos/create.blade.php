@extends('layouts.main')

@section('content')

<div id="ite,-create-container" class="col-md-6 offset-md-3" >
    <h2>Criar Novo Orgão</h2>
    <form action="/orgaos" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome do Orgão:</label>
            <input type="text" name="nome"  class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>

      
    </form>
</div>
    

@endsection