<?php

namespace App\Models\Levels\Challenges;

use Illuminate\Database\Eloquent\Model;
use App\Models\Logs\Answer_Scores_Log;

class Answer_Scores extends Model
{
    //Cambiamos el nombre del timestamp
    const CREATED_AT = 'scored_at';
    const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'answer_id',
        'score',
        'strike',
    ];

    /*
		Obtenemos las respuestas que el usuario ya haya calificado
    */
    public static function getExcudedAnswers($user){
        return static::where('user_id', $user)
            ->pluck('answer_id')->toArray();
    }

    /*
		Función que guarda los logs
    */
    public static function saveLog($score){
        return Answer_Scores_Log::create($score);
    }

}
