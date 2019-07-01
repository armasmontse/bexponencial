<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Action_Log extends Model
{

	protected $fillable = [
        'user_id',
        'action_commited'
	];

    public static function saveActionLog($userId, $message){
    	return static::create(
            [
                'user_id' => $userId,
                'action_commited' => $message
            ]
        );
    }

}
