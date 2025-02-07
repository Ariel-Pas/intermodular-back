<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregunta extends Model
{
    use HasFactory;
    protected $table = 'preguntas';
    protected $guarded = [];

    public function formularios() {
        return $this->belongsToMany(Formulario::class); // una pregunta 'tiene' o está en muchos formularios
    }

    public function resenias() {
        return $this->hasMany(Resenia::class, 'pregunta_id'); // Una Pregunta tiene muchas Resenias.
    }
}
