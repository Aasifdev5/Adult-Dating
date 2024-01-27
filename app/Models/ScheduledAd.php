<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledAd extends Model
{
    protected $fillable = [
        'ad_id',
        'category',
        'alt_text',
        'start_time',
        'end_time',
        'title', 'city', 'age', 'user_id', 'start_time', 'end_time'
    ];
}
