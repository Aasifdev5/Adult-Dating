<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledAd extends Model
{
    protected $fillable = [
        'image',
        'url',
        'alt_text',
        'start_time',
        'end_time',
    ];
}
