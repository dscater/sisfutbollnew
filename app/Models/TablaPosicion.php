<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaPosicion extends Model
{
    use HasFactory;

    protected $fillable = [
        'campeonato_id', 'equipo_id', 'walkover', 'puntos',
        'Pj', 'Pp', 'Pe', 'Gf', 'Gc', 'GD', 'grupo'
    ];

    public function equipo()
    {
        return $this->belongsTo(equipoClub::class, 'equipo_id');
    }
}
