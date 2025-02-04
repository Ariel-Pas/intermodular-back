<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $guarded = [];

    public function ciclos() {
        return $this->belongsToMany(Ciclo::class)->withPivot('numero_puestos'); // agregar el withpivot
    }

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id'); // una Solicitd pertenece a una Empresa
    }

    public function centro() {
        return $this->belongsTo(Centro::class, 'centro_id'); // una Solicitd pertenece a un Centro
    }

    
}
