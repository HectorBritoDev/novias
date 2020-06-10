<?php

namespace App;

use App\Spend;
use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{
    protected $fillable = ['name', 'budget_category_id', 'estimated_cost', 'final_cost'];

    public function total_pay($id)
    {
        $total = 0;
        $spends = Spend::where('budget_category_id', $id)->get();
        foreach ($spends as $spend) {
            if (!empty($spend->payment)) {
                $total = $total + $spend->payment->amount;
            }
        }
        return $total;

    }

    //RELATIONSHIPS
    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function budgetCategory()
    {
        return $this->belongsTo('App\BudgetCategory');
    }
}
