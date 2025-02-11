@extends('layouts.main')

@section('title', 'Organize2')

@section('content')

<div id="search-container" class="col-md-12 mb-4">
  <h1>Busque um item</h1>
  <form id="search-form">
    <input 
      type="text" 
      id="search" 
      name="search" 
      class="form-control" 
      placeholder="Procurar item"
    >
  </form>
</div>

<div id="itensRecents-container" class="col-md-12">
  <h2>Últimos Itens Adicionados</h2>
  
  <div class="row">
    @foreach ($recentItems as $item)
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $item->nome_item }}</h5>
            <p class="card-text"><strong>Patrimônio:</strong> {{ $item->patrimonio }}</p>
            <p class="card-text"><strong>Quantidade:</strong> {{ $item->quantidade }}</p>
            <p class="card-text"><strong>Local:</strong> {{ $item->local->nome }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($item->status) }}</p>
            <p class="card-text"><strong>Categoria:</strong> {{ $item->categoria->nome }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <button type="submit" class="btn btn-secondary">Ver itens</button>
</div>

@endsection
