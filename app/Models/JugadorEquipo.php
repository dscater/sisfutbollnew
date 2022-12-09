<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JugadorEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        "jugador_id",
        "equipo",
        "anio",
        "descripcion",
    ];

    public function jugador()
    {
        return $this->belongsTo(jugador::class, 'jugador_id');
    }
}
