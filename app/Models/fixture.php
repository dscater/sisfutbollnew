<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fixture extends Model
{
    use HasFactory;


    public function partidos()
    {
        return $this->belongsToMany(partido::class);
    }
}
