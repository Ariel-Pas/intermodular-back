<?php

namespace App\Models;

use Flogti\SpanishCities\Traits\HasTown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    //use HasFactory, HasTown;
    protected $guarded = ['id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function centros(){
        return $this->belongsToMany(Centro::class)->withPivot('notas');
    }
}
