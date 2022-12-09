<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sancion extends Model
{
    use HasFactory;

    protected $fillable = ['jugador_id', 'tarjeta'];

    public function jugador()
    {
        return $this->belongsTo(Jugador::class, 'jugador_id');
    }
}
