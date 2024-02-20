<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidTopAd extends Model
{
    use HasFactory;

    protected $fillable = ['top_ad_id', 'user_id', 'amount', 'ad_id','start_time','end_time'];

    public function topAd()
    {
        return $this->belongsTo(Ad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
