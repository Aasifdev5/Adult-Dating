<?php


namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';

    protected $fillable = [
        'code',
        'name',
        'capital',
        'continent_code',
        'tld',
        'currency_code',
        'phone',
        'languages',
        'time_zone',
        'date_format',
        'datetime_format',
        'background_image',
        'admin_type',
        'active',
    ];
}
