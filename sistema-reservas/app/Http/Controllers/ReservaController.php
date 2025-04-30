<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('sala')->where('data', '>=', now()->toDateString())->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $salas = Sala::all();
        return view('reservas.create', compact('salas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sala_id' => 'required|exists:salas,id',
            'usuario' => 'required|string|max:255',
            'data' => 'required|date|after_or_equal:today',
            'horario_inicio' => 'required',
            'horario_fim' => 'required|after:horario_inicio',
        ]);

        // Verificar conflito de horário
        $existingReservation = Reserva::where('sala_id', $request->sala_id)
            ->where('data', $request->data)
            ->where(function($query) use ($request) {
                $query->whereBetween('horario_inicio', [$request->horario_inicio, $request->horario_fim])
                      ->orWhereBetween('horario_fim', [$request->horario_inicio, $request->horario_fim])
                      ->orWhere(function($query) use ($request) {
                          $query->where('horario_inicio', '<', $request->horario_inicio)
                                ->where('horario_fim', '>', $request->horario_fim);
                      });
            })->exists();

        if ($existingReservation) {
            return back()->withErrors(['horario' => 'Já existe uma reserva para esta sala no horário selecionado.'])->withInput();
        }

        Reserva::create($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva criada com sucesso!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
