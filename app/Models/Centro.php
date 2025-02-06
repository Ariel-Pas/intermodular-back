<?php

namespace App\Models;

use Flogti\SpanishCities\Traits\HasTown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Centro extends Model
{
    use HasFactory, HasTown;
    protected $guarded = ['id'];
    
    public function empresas(){
       return $this->belongsToMany(Empresa::class)->withPivot('notas');
    }

    public function usuarios()
    {
       return $this->hasMany(Usuario::class);
    }

    public function ciclos()
    {
        return $this->belongsToMany(Ciclo::class);
    }
}
