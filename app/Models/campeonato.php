<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campeonato extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','fecha_inicio','fecha_fin','descripcion','estado'];

    public function inscripcions()
    {
        return $this->belongsToMany(Inscripcion::class);
    }
    public function partidos()
    {
        return $this->belongsToMany(partido::class);
    }
    public function PuntosPartidos()
    {
        return $this->belongsToMany(PuntosPartido::class);
    }
    public function FixtureFinals()
    {
        return $this->belongsToMany(FixtureFinal::class);
    }
}
