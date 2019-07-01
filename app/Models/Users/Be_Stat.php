<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Be_Stat extends Model
{
    protected $fillable = [
        'user_id',
        'coins',
        'exp_points',
    ];
    public static function CreateStats($id)
    {
        return static::create([
            'user_id'      => $id,
            'coins'      => 0,
            'exp_points'     => 0
        ]);
    }
    public function user(){

        return $this->belongsTo(User::class);

    }

    /*
        Función que se ocupa únicamenta de guardar monedas
    */
    public static function updateCoins($userId, $coins){
        $stats = static::where('user_id', $userId)->first();
        $stats->user_id = $userId;
        $stats->coins = $stats->coins + $coins;
        $stats->save();
    }

    /*
        Función que se ocupa únicamente de guardar puntos de experiencia
    */
    public static function updateExpPoints($userId, $expPoints){
        return static::update([
            'user_id' => $userId,
            'exp_points' => $expPoints
        ]);
    }
}
