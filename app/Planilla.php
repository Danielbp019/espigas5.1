<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    protected $table = 'planilla';
    protected $primaryKey = 'nir';
    public $timestamps = false;
    
    public function scopeSearch($query, $codigo)
    {
        return $query->where('codigo', 'LIKE', "%$codigo%");
    }
}
