<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transaction';

    protected $fillable = ['user_id', 'payment_amount','product_id','date'];


	public $timestamps = false;
 
	  
}
