<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];
    protected $fillable =
        [
        'name',
        'surname',
        'email',
        'phone',
        'cellphone',
        'adress',
        'postal_code',
        'status',
        'gender',
        'age',
        'group_id',
        'menu_id',
        'user_id',
        'municipio_id',
    ];

    //ACCESSORS

    public function getStatusNameAttribute()
    {
        if ($this->status == 0) {
            return 'Pendiente';
        } else {
            return 'Confirmado';
        }

    }
    //SCOPE
    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }

    }
    public function scopeSurame($query, $surname)
    {
        if ($surname) {
            return $query->where('surname', 'LIKE', "%$surname%");
        }

    }

    //RELATIONSHIPS
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function companions()
    {
        return $this->hasMany('App\Companion');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
