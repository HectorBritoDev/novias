<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //ACCESSORS
    public function getFullMunicipioAttribute()
    {
        return $this->attributes['municipio'] . ' , ' . $this->departamento->departamento;
    }
    //RELATIONSHIPS
    public function departamento()
    {
        return $this->belongsTo('App\Departamento', 'departamento_id', 'id_departamento');
    }
}
