@extends('layouts.app')

@section('content')
    <h1>Adicionar Nova Sala</h1>
    
    <form action="{{ route('salas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Sala</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="capacidade" class="form-label">Capacidade</label>
            <input type="number" class="form-control" id="capacidade" name="capacidade" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection