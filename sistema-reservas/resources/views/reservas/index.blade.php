@extends('layouts.app')

@section('content')
    <h1>Reservas Ativas</h1>
    <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">Nova Reserva</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Sala</th>
                <th>Usuário</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->sala->nome }}</td>
                    <td>{{ $reserva->usuario }}</td>
                    <td>{{ $reserva->data->format('d/m/Y') }}</td>
                    <td>{{ $reserva->horario_inicio }} - {{ $reserva->horario_fim }}</td>
                    <td>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Cancelar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection