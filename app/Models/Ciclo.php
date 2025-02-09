<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $guarded = ['id'];
    public function centros()
    {
        return $this->belongsToMany(Centro::class);
    }


    public function area()
    {
        return $this->belongsTo(AreasCiclo::class);
    }
}

