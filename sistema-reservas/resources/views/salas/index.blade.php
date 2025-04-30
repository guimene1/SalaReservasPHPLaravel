@extends('layouts.app')

@section('content')
    <h1>Lista de Salas</h1>
    <a href="{{ route('salas.create') }}" class="btn btn-primary mb-3">Adicionar Sala</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Capacidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salas as $sala)
                <tr>
                    <td>{{ $sala->nome }}</td>
                    <td>{{ $sala->capacidade }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection