<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['main_photo', 'tag_id', 'name', 'description'];

//SCOPES
    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }

    //RELATIONSHIPS

    public function tag()
    {
        return $this->belongsTo('App\BlogTag');
    }
}
