<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'user_id', 'description'];

    //RELATIONSHIPS

    public function guests()
    {
        return $this->hasMany('App\Guest');
    }
}
