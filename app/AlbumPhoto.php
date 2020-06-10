<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
    protected $fillable = ['album_id', 'photo'];

    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
