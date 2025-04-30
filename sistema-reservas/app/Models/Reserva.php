<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['sala_id', 'usuario', 'data', 'horario_inicio', 'horario_fim'];
    protected $casts = [
        'data' => 'date',
        'horario_inicio' => 'datetime:H:i',
        'horario_fim' => 'datetime:H:i',
    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}