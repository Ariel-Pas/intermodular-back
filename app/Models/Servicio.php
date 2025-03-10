<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'categoria_servicio');
    }

}
