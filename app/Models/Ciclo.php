<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    public function centros()
    {
        return $this->belongsToMany(Centro::class); // saque ->withPivot('numero_puestos')
    }

    public function solicitudes() // agregue
    {
    return $this->belongsToMany(Solicitud::class, 'solicitud_ciclo')->withPivot('numero_puestos');
    }

    public function area()
    {
        return $this->belongsTo(AreasCiclo::class);
    }
}

