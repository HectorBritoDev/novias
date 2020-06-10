<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['user_id', 'name', 'main_photo'];

    public function photos()
    {
        return $this->hasMany('App\AlbumPhoto');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
