<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixtureFinal extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function partidos()
    {
        return $this->belongsToMany(partido::class);
    }
    public function equipoClubs()
    {
        return $this->belongsToMany(equipoClub::class);
    }
    public function campeonatos()
    {
        return $this->belongsToMany(campeonato::class);
    }
}
