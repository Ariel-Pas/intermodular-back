<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Empresa;
use app\Models\Usuario;
class Centro extends Model
{
    use HasFactory;
    public function empresas(){
        $this->belongsToMany(Empresa::class)->withPivot('notas');
    }

    public function usuarios()
    {
        $this->hasMany(Usuario::class);
    }
}
