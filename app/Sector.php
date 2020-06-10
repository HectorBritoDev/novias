<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['sector_name', 'category_id', 'icon'];

    //SCOPES
    public function scopeSectors($query, $sector)
    {
        if ($sector) {
            return $query->join('users', 'sectors.id', '=', 'users.provider_sector_id')->where('sector_name', 'LIKE', "%$sector%");
        }
    }
    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }

    //RELATIONSHIPS
    public function category()
    {
        return $this->belongsTo('App\SectorCategory');
    }

    public function providers()
    {
        return $this->hasMany('App\User', 'id', 'provider_sector_id');
    }

    //Aberraciones
    public function sector()
    {
        return $this->belongsTo('App\Sector', 'provider_sector_id', 'id');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipio', 'municipio_id', 'id_municipio');
    }
}
