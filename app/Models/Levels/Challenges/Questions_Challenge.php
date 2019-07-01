<?php

namespace App\Models\Levels\Challenges;

use Illuminate\Database\Eloquent\Model;

class Questions_Challenge extends Model
{

    public $timestamps = false;
    /**
     * Creamos la relación de questions con answers
    */
    public function answer()
    {
        return $this->hasOne(
        	'App\Models\Levels\Challenges\Answer',
        	'question_challenge_id'
        );
    }

    /**
     * Creamos la relación de questions con challenge
    */
    public function challenge()
    {
        return $this->belongsTo(
        	'App\Models\Levels\Challenges\Challenge',
        	'challenge_id'
        );
    }

    /**
     * Creamos la relación de question con question_type
     */
    public function questionType()
    {
        return $this->belongsTo(
            'App\Models\Levels\Challenges\Question_Type',
            'question_type_id'
        );
    }

    /*
        Scope que obtiene el la pregunta a partir del reto
    */
    public function scopeQuestionByChallengeId($query, $id) {
        return $query->where('challenge_id', $id);
   }
}
