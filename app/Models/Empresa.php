<?php

namespace App\Models;

use Flogti\SpanishCities\Traits\HasTown;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    use HasFactory, HasTown;
    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at', 'token', 'notas'];

    public function centros(){
        return $this->belongsToMany(Centro::class)->withPivot('notas');
    }

    //REVISAR
    public function categorias(){
        return $this->belongsToMany(Categoria::class);
    }

    public function resenias(){
        return $this->hasMany(Resenia::class);
    }

    public function puntuacionMedia(){
        $media = $this->resenias()->whereHas('pregunta', function(Builder $query){
            $query->where('tipo', '=', 'estrellas');
        })->avg('respuesta');

        return $media*2;
    }
}


/* $posts = Post::whereHas('comments', function (Builder $query) {
    $query->where('content', 'like', 'code%');
}, '>=', 10)->get(); */
