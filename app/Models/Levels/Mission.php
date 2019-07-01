<?php

namespace App\Models\Levels;

use App\Models\Levels\Challenges\Challenge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Mission extends Model
{

    public $timestamps = false;

    /**
     * Creamos la relación de missions con challenge
    */

    public function challenges()
    {
        return $this->hasMany(
        	'App\Models\Levels\Challenges\Challenge',
        	'mission_id'
        )->orderBy('sequence_no');
    }


    /**
     * Creamos la relación de mission con villages
    */
    public function village()
    {
        return $this->belongsTo(
        	'App\Models\Levels\Village',
            'village_id'
        );
    }

    /**
     * Creamos la relación de mission con block
    */
    public function block()
    {
        return $this->belongsTo(
        	'App\Models\Levels\Block'
        );
    }

    public static function getMissionsCompleted($userId, $villageId = null){
        //Obtenemos todos las misiones en caso de que esté vacía $villageId
        $missions = empty($villageId) ? static::all() : static::MissionByVillageId($villageId)->get();

        //Definimos una colección para agregar las misiones completadas
        $missionsCompleted = collect();

        //Lo recorremos en un arreglo para obtener los retos que tiene la misión
        foreach ($missions as $mission) {
            //Verificamos si una misión fue completada, si es así, lo agregamos a la colección
            if(static::isMissionCompleted($userId, $mission->id)){
                $missionsCompleted->push($mission);
            }
        }

        return $missionsCompleted->unique();
    }


    public static function getMissionsProgress($userId, $villageId){
        $missions = static::MissionByVillageId($villageId)->get();

        //Definimos una colección para regresarla a la vista
        $missionProgress = collect();

        //Hacemos un foreach a las aldeas para guardar datos referentes a cada una
        foreach ($missions as $mission) {
            //Asignamos a la colección los datos de la misión
            $missionProgress->push(static::getMissionData($userId, $mission));
        }

        return $missionProgress;

    }

    public static function getMissionData($userId, $mission){
        $progress=(Challenge::getChallengesCompleted($userId, $mission->id)->count() * 100)/$mission->challenges()->count();
        return [
            'missionId' => $mission->id,
            'missionName' => $mission->label,
            'mobile_coords' => $mission->mobile_coordinates,
            'coords' => $mission->coordinates,
            'progress' => $progress
        ];
    }

    /*
        Función que evalúa si una missión está completada
    */
    public static function isMissionCompleted($userId, $missionId){
        //Obtenemos todos los retos de esa misión
        $challenges = Challenge::ChallengeByMissionId($missionId)->get();

        if($challenges->isEmpty()){
            return false;
        }

        //Asumimos que la missión está completa
        $missionComplete = true;

        //Lo recorremos en un arreglo para mandar los datos a la función
        //que evalúa si un reto se cumplió

        foreach ($challenges as $challenge) {
            //Si entra al bloque, al menos un reto no está completado, por lo tanto, la misión tampoco
            if(!Challenge::isChallengeCompleted($userId, $challenge->id)){
                $missionComplete = false;
            }
        }

        return $missionComplete;
    }

    /*
        Función que obtiene los breadcrumbs a partir de las misiones
    */
    public static function getBreadcrumbsByMission($missionId){
        $villagesData = static::find($missionId)->village()->first();
        $blockData = $villagesData->block()->first();
        $levelData = $blockData->levels()->first();

        $breadcrumbs = collect();
        $breadcrumbs->push($levelData->only(['id', 'label']));
        $breadcrumbs->push($blockData->only(['id', 'label']));
        $breadcrumbs->push($villagesData->only(['id', 'label']));

        return $breadcrumbs;

    }

    /*
        Scope que obtiene la misión a partir de la aldea
    */
    public function scopeMissionByVillageId($query, $id) {
        return $query->where('village_id', $id);
    }

}
