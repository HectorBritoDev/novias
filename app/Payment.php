<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =
        [
        'name',
        'status',
        'pay_date',
        'expiration_date',
        'pay_by',
        'pay_method',
        'amount',
        'spend_id',
    ];

    public function spend()
    {
        return $this->belongsTo('App\Spend');
    }

    public function getStatusNameAttribute()
    {
        if ($this->status == 1) {
            return 'pagado';
        } else {
            return 'pendiente';
        }
    }
}
