<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = [
        'capital_id',
        'name'
    ];



    public function province()
    {
        return $this->belongsTo('Flogti\SpanishCities\Models\Province', 'province_id', 'id');
    }
}
