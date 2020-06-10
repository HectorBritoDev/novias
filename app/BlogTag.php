<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = ['name'];

    public function blogs()
    {
        return $this->hasMany('App\Blog', 'tag_id');
    }
}
