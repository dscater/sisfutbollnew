<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosPartido extends Model
{
    use HasFactory;


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
