<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Centro;

class Empresa extends Model
{
    use HasFactory;

    public function centros(){
        return $this->belongsToMany(Centro::class)->withPivot('notas');
    }
}
