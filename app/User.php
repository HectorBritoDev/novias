<?php

namespace App;

use App\Sector;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'status',
        'avatar',
        'nickname',
        'email',
        'password',
        'marrige_date',
        'gender',
        'departamento_id',
        'municipio_id',
        'phone',
        'about_me',
        'about_my_marrige',
        'partner_name',
        'partner_birthday',
        'partner_gender',
        'expected_guests',

        'father_name',
        'father_birthday',
        'mother_name',
        'mother_birthday',

        'wedding_municipio_id',
        'wedding_hour_start',
        'wedding_minute_start',
        'wedding_hour_finish',
        'wedding_minute_finish',
        'wedding_style_id',
        'wedding_color_id',
        'wedding_weather_id',
        'wedding_honeymoon',

        'provider_description',
        'provider_min_cost',
        'provider_adress',
        'provider_logo',
        'provider_logo_description',
        'provider_main_photo',
        'provider_main_photo_description',
        'provider_contact_name',
        'provider_contact_email',
        'provider_contact_phone',
        'provider_contact_cellphone',
        'provider_contact_fax',
        'provider_contact_website',
        'provider_discount',
        'provider_video',
        'provider_sector_id',
        'provider_category_id',
        'provider_faq_id',

    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Accessors and Mutators

    public function getIsAdminAttribute()
    {
        return $this->role == 0;
    }
    public function getIsUserAttribute()
    {
        return $this->role == 1;
    }
    public function getIsProviderAttribute()
    {
        return $this->role == 2;
    }

    //Query Scope

    public function scopeSector($query, $sector)
    {
        if ($sector) {
            return $query->join('sectors', 'provider_sector_id', '=', 'sectors.id')->where('sector_name', 'LIKE', "%$sector%");
        }
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }
    //Relationships

    public function departamento()
    {
        return $this->belongsTo('App\Departamento', 'departamento_id', 'id_departamento');
    }
    public function municipio()
    {
        return $this->belongsTo('App\Municipio', 'municipio_id', 'id_municipio');
    }

    public function wedding_municipios()
    {
        return $this->belongsTo('App\Municipio', 'wedding_municipio_id', 'id_municipio');
    }

    public function sector()
    {
        return $this->belongsTo('App\Sector', 'provider_sector_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\SectorCategory', 'provider_category_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function video()
    {
        return $this->hasOne('App\Video');
    }
}
