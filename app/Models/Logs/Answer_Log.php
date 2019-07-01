<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Answer_Log extends Model
{
	//Cambiamos el nombre del timestamp
    const CREATED_AT = 'answered_at';
    const UPDATED_AT = null;

    protected $fillable = [
        'answer_id',
        'answer_file',
        'answer_text',
        'answer_url',
    ];

    public static function saveAnswerLog($answer){
    	return static::create(
            [
                'answer_id' => $answer->id,
                'answer_text' => $answer->answer_text,
                'answer_file' => $answer->answer_file,
                'answer_url' => $answer->answer_url,
            ]
        );
    }
}
