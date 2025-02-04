<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resenia extends Model
{
    protected $table = 'resenias';
    protected $guarded = [];

    public function formulario() {
        return $this->belongsTo(Formulario::class, 'formulario_id'); // una Resenia pertenece a un Formulario
    }

    public function pregunta() {
        return $this->belongsTo(Pregunta::class, 'pregunta_id'); // una Resenia pertenece a un Pregunta
    }

    public function empresa() {
        return $this->belongsTo(Empresa::class, 'empresa_id'); // una Resenia pertenece a una Empresa
    }

    public function centro() {
        return $this->belongsTo(Centro::class, 'centro_id'); // una Resenia pertenece a un Centro
    }

}
