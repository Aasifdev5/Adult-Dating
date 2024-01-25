<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    protected $fillable = ['user_id', 'bank_name', 'account_number', 'ifsc_code','qrcode_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
