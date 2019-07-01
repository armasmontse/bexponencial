<?php

namespace App\Models\Users\Plans;

use Illuminate\Database\Eloquent\Model;

class User_Payment_Method extends Model
{
	protected $fillable = [
        'platform_token',
        'recurrence',
        'user_id',
        'payment_type_id'
    ];


    /*
		Relación de métodos de pago a usuarios
    */
    public function user()
    {
        return $this->belongsTo(
            'App\Models\Users\User',
            'user_id'
        );
    }

    /*
        Relación de métodos de pago con tipos de métodos de pago
    */
    public function payment_type()
    {
        return $this->belongsTo(
            'App\Models\Users\Plans\Payment_Type',
            'payment_type_id'
        );
    }
}
