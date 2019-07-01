<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Models\Levels\Challenges\Answer;
use App\Models\Levels\Challenges\Answer_Scores;
use App\Models\Logs\Answer_Scores_Log;
use App\Models\Users\User;
use Illuminate\Http\Request;

class AnswerScoresController extends Controller
{

	/*
		Función que obtiene una respuesta random de la misma pregunta
		y que no sea la misma que haya respondido el usuario
    */
    public function getRandomAnswerByQuestion($questionId){

		//Este arreglo contiene los ids de las respuestas que se han calificado
		$excludedAnswers = Answer_Scores::getExcudedAnswers($this->user->id);

		//Obtenemos la pregunta random
		$answer = Answer::getRandomAnswer($this->user->id, $excludedAnswers, $questionId);

    	return [
    		'answer' => $answer,
    		'relatedQuestion' => Answer::getQuestion($questionId)
    	];
    }

	/*
    	Función que guarda la puntuación que un usuario le da a otra respuesta
    */
    public function storeRatingAnswer(Request $request){
		//Para más versatilidad guardamos el request en una variabe
		$requestData = $request->all();
		$requestData['user_id'] = $this->user->id;

		//Preguntamos si se hizo de manera correcta para guardar en otra tabla
		$answerScore = Answer_Scores::create($requestData);

		if($answerScore){
			$requestData['answer_score_id'] = $answerScore->id;
			//Creamos el log
			Answer_Scores::saveLog($requestData);

			//Traemos las estadísticas del usuario
            $userStats = $this->user->stats()->first();

            $this->user->stats()->update([
                'coins' => $userStats->coins + 10
            ]);

			return $answerScore;
		}

		return response()->json([
            'errors' => 'Hubo un problema al guardar la pregunta'
        ], 400);

    }
}
