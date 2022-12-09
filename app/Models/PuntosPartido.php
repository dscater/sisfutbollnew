<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosPartido extends Model
{
    use HasFactory;

    protected $fillable = [
        "campeonato_id", "equipo_id", "partido_id", "walkover", "puntos", "Pj", "Pg", "Pp", "Pe", "Gf", "Gc", "GD",
    ];

    public function campeonatos()
    {
        return $this->belongsToMany(campeonato::class);
    }
    public function partidos()
    {
        return $this->belongsToMany(partido::class);
    }
    public function equipos()
    {
        return $this->belongsToMany(equipoClub::class);
    }
}
