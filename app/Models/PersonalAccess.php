<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccess extends Model
{
    protected $table = 'personal_access_tokens';
    protected $fillable = ['tokenable_id', 'name', 'token'];
}
