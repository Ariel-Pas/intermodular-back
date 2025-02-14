<?php

namespace App\Models;

use Flogti\SpanishCities\Traits\HasTown;
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

    public function solicitudes() {
        return $this->hasMany(Solicitud::class);
    }
}
