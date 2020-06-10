<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectorCategory extends Model
{
    public function sectors()
    {
        return $this->hasMany('App\Sector', 'category_id');
    }

}
