<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jugador extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "apep",
        "apem",
        "ci",
        "ci_exp",
        "fecha_nac",
        "lugar_nac",
        "nacionalidad",
        "nro_casaca",
        "fecha_afi",
        "observacion",
        "equipoclub_id",
        "status",
    ];

    protected $appends = ["full_name"];

    public function getFullNameAttribute()
    {
        return $this->nom . ' ' . $this->apep . ' ' . $this->apem;
    }

    public function equipos()
    {
        return $this->hasMany(JugadorEquipo::class, 'jugador_id');
    }

    public function equipoclub()
    {
        return $this->belongsTo(equipoClub::class, "equipoclub_id");
    }
}
