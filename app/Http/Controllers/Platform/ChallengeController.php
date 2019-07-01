<?php

namespace App\Http\Controllers\Platform;
use App\Models\Levels\Challenges\Challenge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function getQuestions($challengeId){
        $challenge = Challenge::where('id', $challengeId)->first();
    	//Obtenemos todas las preguntas del reto con su tipo de pregunta
        $questions = $challenge
        	->questions()
        	->with('questionType')
        	->get();

        return [
            'questions' => $questions,
            'answers' => Challenge::getAnswersCustomFormat($questions, $this->user->id),
            'challengePoints' => (int)$challenge->exp_points,
            'challengeCoins' => (int)$challenge->coins,
        ];
    }

    /*
        Función que devuelve breadcrumbs y challenges para el drive de acuerdo a la misión
    */
    public function getDataByMission($missionId){
        $challengesArr = Challenge::ChallengeByMissionId($missionId)->get();

        $answers = [];
        $editable = [];

        $challenges = collect();
        foreach ($challengesArr as $challenge) {

            //Obtenemos las preguntas que haya respondido el usuario
            $questions = Challenge::getQuestionsWhereHasUserAnswer($challenge->id, $this->user->id);

            if($questions->isNotEmpty()){
                $answers[$challenge->id] = Challenge::getAnswersCustomFormat($questions, $this->user->id);
                $editable[$challenge->id] = Challenge::showAnswers($answers[$challenge->id]);
                $challenges->push($questions);
                //$challenges->push(Challenge::questionsWithAnswers($questions, $this->user->id));
            }
        }

        return [
            'challenges' => $challenges,
            'answers' => $answers,
            'editable' => $editable,
            'breadcrumbs' => Challenge::getBreadcrumbs($missionId),
            'missionName' => Challenge::getMissionName($missionId)
        ];
    }
}
