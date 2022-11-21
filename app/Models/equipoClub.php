<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipoClub extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id','nombre','logo','fecha_fund','presidente','vicepresidente','color_camiseta','color_pantalo','color_medias','direccion','celular','email','observacion','estado'];

    public function Jugadors()
    {
        return $this->hasMany(jugador::class);
        # code...
    }
     public function categoria()
     {
         return $this->hasOne(categoria::class);
         # code...
     }
     public function inscriptions()
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
