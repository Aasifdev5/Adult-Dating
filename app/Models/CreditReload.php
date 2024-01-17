<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditReload extends Model
{
    protected $fillable = ['user_id', 'amount', 'payment_receipt', 'accepted'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
