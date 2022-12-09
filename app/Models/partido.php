<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'campeonato_id', 'equipoA_id', 'equipoB_id',
        'gol_equipoA', 'gol_equipoB', 'fecha_Par', 'hora',
        'walkover', 'detalle', 'grupo', 'estado', 'tipo'
    ];

    public function campeonatos()
    {
        return $this->belongsToMany(campeonato::class);
    }

    public function equipoClubs()
    {
        return $this->belongsToMany(equipoClub::class);
    }
    public function PuntosPartidos()
    {
        return $this->belongsToMany(PuntosPartido::class);
    }
    public function FixtureFinals()
    {
        return $this->belongsToMany(FacturaFinal::class);
    }
}
