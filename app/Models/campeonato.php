<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campeonato extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin', 'descripcion', 'serie', 'estado'];

    public function inscripcions()
    {
        return $this->hasMany(Inscripcion::class, "campeonato_id");
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

    public static function series()
    {
        return [
            "SERIE 1" => [
                "grupos" => false,
                "min_equipos" => 9,
                "clasifican" => 8,
            ],
            "SERIE 2" => [
                "grupos" => true,
                "nro_grupos" => 2,
                "clasifican" => 4,
                "min_equipos" => 10,
                "terceros" => false,
            ],
            "SERIE 3" => [
                "grupos" => true,
                "nro_grupos" => 3,
                "clasifican" => 2,
                "min_equipos" => 12,
                "terceros" => true,
                "nro_terceros" => 2
            ],
            "SERIE 6" => [
                "grupos" => true,
                "nro_grupos" => 6,
                "clasifican" => 2,
                "min_equipos" => 24,
                "terceros" => true,
                "nro_terceros" => 2
            ],
        ];
    }
}
