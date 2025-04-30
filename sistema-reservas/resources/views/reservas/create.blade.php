@extends('layouts.app')

@section('content')
    <h1>Nova Reserva</h1>
    
    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="sala_id" class="form-label">Sala</label>
            <select class="form-select" id="sala_id" name="sala_id" required>
                <option value="">Selecione uma sala</option>
                @foreach($salas as $sala)
                    <option value="{{ $sala->id }}">{{ $sala->nome }} (Capacidade: {{ $sala->capacidade }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Nome do Responsável</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="data" min="{{ date('Y-m-d') }}" required>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="horario_inicio" class="form-label">Horário Início</label>
                <input type="time" class="form-control" id="horario_inicio" name="horario_inicio" required>
            </div>
            <div class="col">
                <label for="horario_fim" class="form-label">Horário Fim</label>
                <input type="time" class="form-control" id="horario_fim" name="horario_fim" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>
@endsection