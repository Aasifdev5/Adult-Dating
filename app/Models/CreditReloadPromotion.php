<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditReloadPromotion extends Model
{
    protected $fillable = ['name', 'minimum_amount', 'discount_percentage'];
}
