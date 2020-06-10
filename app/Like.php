<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['price', 'notes', 'rating', 'user_id', 'provider_id', 'sector_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function provider()
    {
        return $this->belongsTo('App\User', 'provider_id', 'id');
    }
}
