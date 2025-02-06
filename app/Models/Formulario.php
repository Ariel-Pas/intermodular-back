<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Formulario extends Model
{
    use HasFactory;
    protected $table = 'formularios';
    protected $guarded = [];

    public function preguntas() {
        return $this->belongsToMany(Pregunta::class); // un Formulario tiene muchas Preguntas
    }

    public function resenias() {
        return $this->hasMany(Resenia::class, 'formulario_id'); // Un Formulario tiene muchas Resenias
    }
}
