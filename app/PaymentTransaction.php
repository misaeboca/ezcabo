<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = ['email','user_id','gateway','payment_amount','date'];


	public $timestamps = false;
  
	
}
