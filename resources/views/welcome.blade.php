@extends('layouts.main')

@section('title', 'Organize2')

@section('content')

<div id="search-container" class="col-md-12 mb-4">
  <h1>Busque um item</h1>
  <form id="search-form" action="{{ route('items.index') }}" method="GET">
    <input 
      type="text" 
      id="search" 
      name="search" 
      class="form-control" 
      placeholder="Procurar item">
    <button type="submit" class="btn btn-primary mt-2">Buscar</button>
  </form>
</div>

<!-- NOVA SEÇÃO: ITENS DE CONSUMO (Papel A4 e Bobina) -->
<div id="itensConsumo-container" class="col-md-12 mb-4">
  <h2>Itens de Consumo Costante</h2>

  <div class="row">
    @foreach ($consumoItems as $item)
      <div class="col-md-4 mb-3">
        <div class="card border-warning">
          <div class="card-body">
            <h5 class="card-title text-warning">{{ $item->nome_item }}</h5>
            <p class="card-text"><strong>Quantidade:</strong> {{ $item->quantidade }}</p>
            <p class="card-text"><strong>Local:</strong> {{ $item->local->nome ?? 'Desconhecido' }}</p>
            <p class="card-text"><strong>Categoria:</strong> {{ $item->categoria->nome }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<div id="itensRecents-container" class="col-md-12">
  <h2>Últimos Itens Adicionados</h2>
  
  <div class="row">
    @foreach ($recentItems as $item)
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $item->nome_item }}</h5>
            <p class="card-text"><strong>Patrimônio:</strong> {{ $item->patrimonio ?? 'N/A' }}</p>
            <p class="card-text"><strong>Quantidade:</strong> {{ $item->quantidade }}</p>
            <p class="card-text"><strong>Local:</strong> {{ $item->local->nome ?? 'Desconhecido' }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($item->status) }}</p>
            <p class="card-text"><strong>Categoria:</strong> {{ $item->categoria->nome }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <a href="{{ route('items.index') }}" class="btn btn-secondary">Ver todos os itens</a>
</div>

@endsection
