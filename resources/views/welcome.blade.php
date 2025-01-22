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
  </div>
</div>
@endsection
