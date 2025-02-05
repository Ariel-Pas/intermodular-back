<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $guarded = ['id'];

    protected $fillable = ['nombre'];

    protected $hidden = ['created_at', 'updated_at'];

    public function servicios(){
        return $this->belongsToMany(Servicio::class, 'categoria_servicio');
    }

    public function empresas(){
        return $this->belongsToMany(Empresa::class);
    }

}
