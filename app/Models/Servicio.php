<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

    //CAMBIADO DE belongsToMany A belongsTo
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

}
