<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetCategory extends Model
{
    protected $fillable = ['name', 'user_id', 'total_estimated', 'total_final', 'total_pay'];

    public function total_estimated()
    {
        return $this->spends->sum('estimated_cost');

    }
    public function total_final()
    {
        return $this->spends->sum('final_cost');

    }

    //RELATIONSHIPS
    public function spends()
    {
        return $this->hasMany('App\Spend');
    }

}
