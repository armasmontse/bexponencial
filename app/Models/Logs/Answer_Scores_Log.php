<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Answer_Scores_Log extends Model
{
    //Cambiamos el nombre del timestamp
    const CREATED_AT = 'scored_at';
    const UPDATED_AT = null;

    protected $fillable = [
    	'answer_score_id',
        'score',
        'strike'
    ];
}
