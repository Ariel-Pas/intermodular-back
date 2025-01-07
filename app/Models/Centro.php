<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Centro extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function empresas(){
       return $this->belongsToMany(Empresa::class)->withPivot('notas');
    }

    public function usuarios()
    {
       return $this->hasMany(Usuario::class);
    }
}
