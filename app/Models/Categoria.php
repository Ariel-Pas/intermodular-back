<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $guarded = ['id'];

    protected $fillable = ['nombre'];

    protected $hidden = ['created_at', 'updated_at'];

    //CAMBIADO DE belongsToMany A HasMany
    public function servicios(){
        return $this->hasMany(Servicio::class);
    }

    public function empresas(){
        return $this->belongsToMany(Empresa::class);
    }

}
