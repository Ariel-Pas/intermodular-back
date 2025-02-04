<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    public function centros()
    {
        return $this->belongsToMany(Centro::class)->withPivot('numero_puestos');
    }
}

