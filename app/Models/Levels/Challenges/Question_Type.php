<?php

namespace App\Models\Levels\Challenges;

use Illuminate\Database\Eloquent\Model;

class Question_Type extends Model
{

    public $timestamps = false;
   	/**
     * Creamos la relación de missions con challenge
    */
    public function questions()
    {
        return $this->hasMany(
        	'App\Models\Levels\Challenges\Questions_Challenge',
        	'question_type_id'
        );
    }
}
