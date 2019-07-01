<?php

namespace App\Models\Levels\Challenges;

use App\Models\Levels\Mission;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users\Skill;

class Challenge extends Model
{

    public $timestamps = false;


    public function skills()
    {
        return $this->belongsToMany(Skill::class)->withPivot('value');
    }

    /**
     * Creamos la relación de challenge con question
    */

    public function questions()
    {
        return $this->hasMany(
        	'App\Models\Levels\Challenges\Questions_Challenge',
        	'challenge_id'
        );
    }

    /**
     * Creamos la relación de challenge con mission
    */
    public function mission()
    {
        return $this->belongsTo(
        	'App\Models\Levels\Mission',
        	'mission_id'
        );
    }

    /*
        Relación con el tipo de reto
    */
    public function challenge_type(){
        return $this->belongsTo(
            'App\Models\Levels\Challenges\Challenge_Type'
        );
    }

    /*
        Función que obtiene los retos que se han completado
        Puede ser por misión o puede ser todos
    */

    public static function getChallengesCompleted($userId, $missionId = null){
        //Obtenemos todos los retos en caso de que esté vacía $missionId
        $challenges = empty($missionId) ? static::all() : static::ChallengeByMissionId($missionId)->get();

         //Definimos una colección para agregar los retos completos
        $challengesCompleted = collect();

        //Lo recorremos en un arreglo para obtener las preguntas que tiene cada reto
        foreach ($challenges as $challenge) {
            //Verificamos si un reto ya fue completado
            if(static::isChallengeCompleted($userId, $challenge->id)){
                $challengesCompleted->push($challenge);
            }
        }

        return $challengesCompleted->unique();
    }

    /*
        Función que obtiene el progreso del reto de un usuario a partir de una misión
    */
    public static function getChallengesProgress($userId, $missionId){
        //Obtenemos todos los retos de esta misión con sus respectivas preguntas
        $challenges = static::ChallengeByMissionId($missionId)
            ->with('challenge_type')
            ->get();

        //Definimos una colección para regresarla a la vista
        $challengeProgress = collect();

        //Hacemos un foreach a los retos para guardar datos referentes a cada uno
        foreach ($challenges as $challenge) {
            $questionsArrayId = $challenge->questions()->pluck('id');
            //Obtenemos el conteo de respuestas que el usuario tiene en este reto
            $questionsAnsweredCount = Answer::AnswersByQuestionIdArray($questionsArrayId)
                ->where('user_id', $userId)
                ->count();

            //Asignamos a la colección los datos del reto
            $challengeProgress->push([
                'challengeId' => $challenge->id,
                'challengeName' => $challenge->challenge_type->label,
                'challengeCoins' => $challenge->coins,
                'challengeExp' => $challenge->exp_points,
                'challengeComplete' => static::isChallengeCompleted($userId, $challenge->id),
                'sequenceNo' => $challenge->sequence_no
            ]);
        }

        return $challengeProgress;
   }

    /*
        Función que regresa true si el reto se completó
    */
    public static function isChallengeCompleted($userId, $challengeId){
        //Obtenemos las preguntas que contiene el reto
        $questions = Questions_Challenge::QuestionByChallengeId($challengeId)->get();

        //Si no hay preguntas, retornamos falso
        if($questions->isEmpty()){
            return false;
        }

        //Obtenemos las respuestas que tiene el usuario en ese reto
        $questionsAnsweredCount = Answer::AnswersByQuestionIdArray($questions->pluck('id'))
            ->where('user_id', $userId)
            ->count();

        return $questions->count() == $questionsAnsweredCount;
    }

    /*
        Función que devuelve los breadcrumbs desde la misión
    */
    public static function getBreadcrumbs($missionId){
        return Mission::getBreadcrumbsByMission($missionId);
    }

    /*
        Función que regresa el nombre de la misión
    */
    public static function getMissionName($missionId){
        return Mission::find($missionId)->label;
    }

    /*
        Función que regresa las preguntas respondidas por un usuario a partir del challenge
    */
    public static function getQuestionsWhereHasUserAnswer($challengeId, $userId){
        //Obtenemos las preguntas que tengan alguna respuesta y que pertenezcan a un usuario en específico
        return static::find($challengeId)->questions()
            //->with('questionType')
            ->whereHas('answer', function ($query) use ($userId) { //Metemos el id a la funcion
                $query->where('user_id', $userId);
            })
            ->get();
    }

    /*
        Función que obtiene las preguntas con sus respuestas
    */
    public static function getAnswersCustomFormat($questions, $userId){
        $answers = [];

        foreach ($questions as $key => $question) {
            //Como solo hay una respuesta por pregunta, obtenemos esa
            $answer = $question->answer()
                ->where('user_id', $userId)
                ->first();

            $answers['answer_text'][$question->id] = isset($answer->answer_text) ? $answer->answer_text : '';
            $answers['answer_url'][$question->id] = isset($answer->answer_url) ?  $answer->answer_url : '' ;
            $answers['answer_file'][$question->id] = isset($answer->answer_file) ? basename($answer->answer_file) : '';
        }

        return $answers;
    }

    /*
        Función que evalúa cada respuesta para verificar su mostrarla o no en el drive
    */
    public static function showAnswers($answers){
        $editable = [];

        foreach ($answers as $type => $answer) {
            foreach ($answer as $key => $value) {
                $editable[$type][$key] = $value != '' ? true : false ;
            }
        }

        return $editable;
    }

    /*
        Scope que obtiene el reto a partir de la mision
    */
    public function scopeChallengeByMissionId($query, $id) {
        return $query->where('mission_id', $id);
   }
}
