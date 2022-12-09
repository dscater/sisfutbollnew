<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = ['campeonato_id', 'equipo_id', 'observacion'];

    public function campeonatos()
    {
        return $this->belongsTo(campeonato::class, 'campeonato_id');
    }
    public function equipoClubs()
    {
        return $this->belongsTo(equipoClub::class, 'equipo_id');
    }
}
