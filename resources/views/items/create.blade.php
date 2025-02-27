@extends('layouts.main')

@section('title', 'Organize2.0 - Adicionar Item')

@section('content')

<!-- Formulário para adicionar um item -->
<div id="item-create-container" class="col-md-6 offset-md-3">
    <h1>Adicionar Item</h1>
    <form action="/items" method="POST">
        @csrf <!-- Token CSRF obrigatório -->
        
        <!-- Nome do item -->
        <div class="form-group">
            <label for="nome_item">Nome do item:</label>
            <input type="text" class="form-control" id="nome_item" name="nome_item" placeholder="Nome do item" required>
        </div>

        <!-- Pergunta sobre patrimônio -->
        <div class="form-group">
            <label for="tem_patrimonio">O item possui patrimônio?</label>
            <select class="form-control" id="tem_patrimonio" name="tem_patrimonio" required onchange="togglePatrimonio()">
                <option value="nao" selected>Não</option>
                <option value="sim">Sim</option>
            </select>
        </div>

        <!-- Número do Patrimônio (oculto por padrão) -->
        <div class="form-group" id="patrimonio-group" style="display: none;">
            <label for="patrimonio">Número do Patrimônio:</label>
            <input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="Código do patrimônio">
        </div>

        <!-- Quantidade do item -->
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade do item" required min="1">
        </div>

        <!-- Local -->
        <div class="form-group">
            <label for="local">Selecione o Local</label>
            <select id="local" name="local_id" class="form-control">
                <option value="">Selecione um local</option>
                @foreach($locais as $local)
                    <option value="{{ $local->id }}">{{ $local->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="novo">Novo</option>
                <option value="usado">Usado</option>
                <option value="danificado">Danificado</option>
            </select>
        </div>

        <!-- Categoria -->
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria_id" class="form-control" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

<!-- Script para alternar entre patrimônio e quantidade -->
<script>
    function togglePatrimonio() {
        console.log("Feito por AndreyssonDEV");
        var temPatrimonio = document.getElementById("tem_patrimonio").value;
        var patrimonioGroup = document.getElementById("patrimonio-group");
        var quantidadeInput = document.getElementById("quantidade");
        if (temPatrimonio === "sim") {
            patrimonioGroup.style.display = "block";
            quantidadeInput.value = 1;
            quantidadeInput.readOnly = true; // Impede alteração da quantidade
        } else {
            patrimonioGroup.style.display = "none";
            quantidadeInput.readOnly = false; // Permite alteração da quantidade
        }
    }

    // Chamar ao carregar a página para restaurar o estado correto
    document.addEventListener("DOMContentLoaded", togglePatrimonio);
</script>

@endsection
