<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreasCiclo extends Model
{
    protected $table ='areasciclos';
    protected $hidden = ['created_at', 'updated_at'];
    public function ciclos()
    {
        return $this->hasMany(Ciclo::class, 'areasciclo_id');
    }
}
