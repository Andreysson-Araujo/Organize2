@extends('layouts.main')

@section('title', 'Criar Usuário')

@section('content')
<div class="container">
    <h1>Criar Usuário</h1>

    {{-- Exibe mensagens de erro --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_admin" id="is_admin" class="form-check-input" {{ old('is_admin') ? 'checked' : '' }}>
            <label for="is_admin" class="form-check-label">Administrador?</label>
        </div>

        <button type="submit" class="btn btn-success">Criar Usuário</button>
    </form>
</div>
@endsection
