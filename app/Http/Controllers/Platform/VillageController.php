<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Models\Levels\Challenges\Challenge;
use App\Models\Levels\Mission;
use App\Models\Levels\Village;
use App\Models\Users\User;
use Illuminate\Http\Request;
use JavaScript;

class VillageController extends Controller
{

	/*
		Función que obtiene las estadísticas generales en el mapa del estudiante
	*/
    public function userProgressMap($block){
        //Obtenemos el progreso de las aldeas mandando como parámetro las misiones completadas
        $villagesProgress = Village::getVillagesProgress($this->user->id, $block);
        return $villagesProgress;
    }

    /*
        Función que obtiene el progreso de una aldea en específico
    */
    public function userProgressVillage($villageId){
        return ['missions' => Mission::getMissionsProgress($this->user->id, $villageId)];
    }

    /*
        Progreso del usuario por mision
    */
    public function userProgressMissions($missionId){
        //Obtenemos los datos de la misión
        $mission = Mission::findOrFail($missionId);

        //Obtenemos los retos completados por mision
        $challengesProgress = Challenge::getChallengesProgress($this->user->id, $missionId);

        //La misión está completada si el pluck de challengeComplete NO contiene FALSE
        $isComplete = !$challengesProgress->pluck('challengeComplete')->contains(false);

        return [
            'missionLabel' => $mission->label,
            'missionDesc' => $mission->desc_one,
            'challenges' => $challengesProgress,
            'missionComplete' => $isComplete,
            'village' => $mission->village->label
        ];
    }
}
