<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationDocument extends Model
{
    protected $fillable = [
        'user_id', 'document_path', 'live_photo_path', 'is_verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
