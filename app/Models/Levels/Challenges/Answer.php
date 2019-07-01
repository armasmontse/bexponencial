<?php

namespace App\Models\Levels\Challenges;

use App\Models\Levels\Mission;
use App\Models\Logs\Action_Log;
use App\Models\Logs\Answer_Log;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Answer extends Model
{
    //Cambiamos el nombre del timestamp
    const CREATED_AT = 'answered_at';
    const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'question_challenge_id',
        'answer_file',
        'answer_text',
        'answer_url',
    ];

    /**
     * Creamos la relación de answers con users
     */
    public function user()
    {
        return $this->belongsTo(
            'App\Models\Users\User',
            'user_id'
        );
    }

    /**
     * Creamos la relación de answers con questions
     */
    public function questions()
    {
        return $this->belongsTo(
            'App\Models\Levels\Challenges\Questions_Challenge',
            'question_challenge_id'
        );
    }

    /**
     * Función estática que guarda  o actualiza la respuesta del usuario
     */
    public static function saveAnswer($answer)
    {
        return static::updateOrCreate(
            [
                'user_id' => $answer['user_id'],
                'question_challenge_id' => $answer['questionId']
            ],
            [
                'answer_text' => isset($answer['answer_text']) ? trim($answer['answer_text']) : '',
                'answer_file' => isset($answer['answer_file']) ? trim($answer['answer_file']) : '',
                'answer_url' => isset($answer['answer_url']) ? trim($answer['answer_url']) : ''
            ]
        );
    }

    /*Función que asigna el path que va a tener el archivo que se subió*/
    public static function setPathFile($extension,$student){
        $path = 'files/students/'.$student;
        //Preguntamos si es una extensión váida de imágenes
        if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg'){
            $path = 'images/students/'.$student;
        }

        //asignamos un path por defecto
        return $path;
    }

    public static function saveAllDataAnswer($requestData, $user){
        $error = null;
        $updated = true;
        $completedData = [
            'completedMission' => false,
            'completedChallenge' => false,
        ];

        DB::beginTransaction();

        try {
            //Guardamos la pregunta
            $answer = Answer::saveAnswer($requestData);

            if($answer){
                //Guardamos en la tabla de answer_logs
                Answer_Log::saveAnswerLog($answer);

                //Si la respuesta es nueva
                if($answer->wasRecentlyCreated){
                    $updated = true;

                    //Guardamos el log de la acción si se creó recientemente la pregunta
                    Action_Log::saveActionLog($user->id, 'La respuesta se guardó correctamente');

                    //Obtenemos banderas de retos completos y misiones completas y guardamos datos de usuario
                    $completedData = static::verifyChallenge($user, $requestData['questionId'], $requestData['challengeId']);
                }else{
                    //Guardamos el log de la acción
                    Action_Log::saveActionLog($user->id, 'La respuesta se actualizó correctamente');
                }

                $success = true;
            }

            //Reaizamos la transacción en la base
            DB::commit();
        } catch (\Exception $e) {
            //Damos rollback
            DB::rollback();

            $success = false;

            $error = $e->getMessage();
        }

        return [
            'success' => $success,
            'error' => $error,
            'completedData' => $completedData,
            'updated' => $updated
        ];
    }

    /*
        Función que verifica si un reto se completó y
        asigna los puntos correspondientes al usuario
    */
    public static function verifyChallenge($user, $questionId, $challengeId){
        $completedMission = false;
        $completedChallenge = false;

        //Si se completó el reto
        if(Challenge::isChallengeCompleted($user->id, $challengeId)){
            //Cargamos el challenge para obtener las monedas y los puntos de experiencia
            $challenge = Challenge::find($challengeId);
            $extraPoints = 0;
            $completedChallenge = true;

            //Guardamos en la tabla de action_log
            Action_Log::saveActionLog($user->id, 'El reto se cumplió exitosamente');

            //Preguntamos si el reto completó la misión
            if(Mission::isMissionCompleted($user->id, $challenge->mission_id)){
                //Guardamos en la tabla de action_log
                Action_Log::saveActionLog($user->id, 'La misión se cumplió exitosamente');
                $completedMission = true;
                $extraPoints = 20;
            }
            $skills = $challenge->skills()->pluck("value","id");
            User::updateStats($user->id, $challenge->exp_points, $challenge->coins, $extraPoints,$skills);
        }

        return [
            'completedMission' => $completedMission,
            'completedChallenge' => $completedChallenge
        ];
    }

    /*
        Función que obtiene la pregunta a partir de su id
    */
    public static function getQuestion($questionId){
        return Questions_Challenge::find($questionId);
    }

    /*
        Función que obtiene una respuesta random
    */
    public static function getRandomAnswer($user, $answers, $questionId){
        return static::AnswerByQuestionId($questionId)
            ->whereNotIn('id', $answers)
            ->whereNotIn('user_id', [$user])
            ->inRandomOrder()
            ->first();
    }

    /*
        Scope que obtiene una respuesta con el id de pregunta
    */
    public function scopeAnswerByQuestionId($query, $id) {
        return $query->where('question_challenge_id', $id);
    }

    /*
        Scope que obtiene una collección de respuestas, si el usuario ha respondido alguna de las preguntas en el arreglo del segundo parámetro
    */
    public function scopeAnswersByQuestionIdArray($query, $idArr) {
        return $query->whereIn('question_challenge_id', $idArr);
    }

    /*
        Scope que obtiene todas las respuestas con archivos
    */
    public function scopeAnswerWithFiles($query){
        return $query->where('answer_file', '!=', '');
    }


}
