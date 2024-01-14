<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = 'general_settings';

    protected $fillable = ['time_zone','site_name','currency_symbol', 'site_email', 'site_logo', 'site_favicon','site_description','site_header_code','site_footer_code','site_copyright'];

}
