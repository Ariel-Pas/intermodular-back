<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'token';
    protected $guarded = [];

    public function formulario() {
        return $this->belongsTo(Formulario::class, 'formulario_id'); // una Resenia pertenece a un Formulario
    }

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id'); // una Resenia pertenece a una Empresa
    }

    public function centro() {
        return $this->belongsTo(Centro::class, 'centro_id'); // una Resenia pertenece a un Centro
    }

    
}
