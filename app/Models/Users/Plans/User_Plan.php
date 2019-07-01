<?php

namespace App\Models\Users\Plans;

use Illuminate\Database\Eloquent\Model;

class User_Plan extends Model
{
	//Cambiamos el nombre del timestamp
    const CREATED_AT = null;
    const UPDATED_AT = 'last_payment';

	protected $primaryKey = 'subscription_token';

    protected $fillable = [
    	'subscription_token',
        'plan_id',
        'payment_method_id',
        'last_payment'
    ];
}
