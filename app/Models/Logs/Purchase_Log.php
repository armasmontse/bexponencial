<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Purchase_Log extends Model
{
	//Cambiamos el nombre del timestamp
    const CREATED_AT = 'buyed_at';
    const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
		'item_table',
		'item_id'
    ];
    public function user()
    {
        return $this->belongsTo(
            'App\Models\Users\User',
            'user_id'
        );
    }
    /*
        Función que verifica si un elemento fue comprado
    */
    public static function isPurchasedItem($userId, $itemId, $item){
    	return static::where([
    		'user_id' => $userId,
    		'item_table' => $item,
    		'item_id' => $itemId
    	])->get()->isNotEmpty();
    }

    /*
        Función que compra un item
    */
    public static function purchaseSecretFile($userId, $itemId, $item){
    	return static::create([
    		'user_id' => $userId,
    		'item_table' => $item,
    		'item_id' => $itemId
    	]);
    }
}
