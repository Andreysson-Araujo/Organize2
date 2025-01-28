@extends('layouts.main')

@section('title', 'Organize2.0 - Locais')

@section('content')
    <div class="container">
        <h1>Locais</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locais as $local)
                    <tr>
                        <td>{{ $local->id }}</td>
                        <td>{{ $local->nome }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
