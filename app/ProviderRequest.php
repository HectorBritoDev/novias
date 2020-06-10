<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderRequest extends Model
{

    protected $fillable = [
        'user_id',
        'for',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'applicant_date',
        'applicant_guests_number',
        'applicant_comment',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    function for () {
        return $this->belongsTo('App\User', 'for', 'id');
    }

}
