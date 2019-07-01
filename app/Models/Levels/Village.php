<?php

namespace App\Models\Levels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Levels\Challenges\Challenge;

class Village extends Model
{
    public $timestamps = false;

    /**
     * Creamos la relación de village con bloques
    */
    public function block()
    {
        return $this->belongsTo(
            'App\Models\Levels\Block'
        );
    }

    /**
     * Creamos la relación de village con missions
    */
    public function missions()
    {
        return $this->hasMany(
            'App\Models\Levels\Mission',
            'village_id'
        );
    }

    /**
     * Creamos la relación de village con secret files
    */
    public function secretFile()
    {
        return $this->hasOne(
            'App\Models\Levels\Files\Secret_File',
            'village_id'
        );
    }

    /**
     * Creamos la relación de villages con missions
    */
    public static function MapProgressInfo($user, $village)
    {
        return static::getVillageData($user->id, $village);
    }

    /*
        Función que obtiene todas las aldeas completas
    */
    public static function getVillageCompleted($userId, $blockId = null){
        //Obtenemos todos las aldeas en caso de que esté vacía $vlockId
        $villages = empty($villageId) ? static::all() : static::VillageByBlockId($villageId)->get();

        //Definimos una colección para agregar las misiones completadas
        $villageCompleted = collect();

        //Lo recorremos en un arreglo para obtener los retos que tiene la misión
        foreach ($villages as $village) {
            //Verificamos si una misión fue completada, si es así, lo agregamos a la colección
            if(static::isVillageCompleted($userId, $village->id)){
                $villageCompleted->push($village);
            }
        }

        return $villageCompleted->unique();
    }

    /**
     * Función que obtiene el progreso de la aldea
    */
    public static function getVillagesProgress($userId, $blockId){
        //Obtenemos todas las aldeas del bloque
        $villages = static::VillageByBlockId($blockId)->get();

        //Definimos una colección para regresarla a la vista
        $villagesProgress = collect();

        //Hacemos un foreach a las aldeas para guardar datos referentes a cada una
        foreach ($villages as $village) {
            //Asignamos a la colección el nombre de la aldea, las misiones completadas del usuario y las misiones en total
            $villagesProgress->push(static::getVillageData($userId, $village));
        }

        return $villagesProgress;
    }

    /*
        Función que recibe el id del usuario y la instancia de la aldea para regresar el progreso
    */
    public static function getVillageData($userId, $village){
        return [
            'villageId' => $village->id,
            'villageName' => $village->label,
            'villageMissionsFinishedCount' => Mission::getMissionsCompleted($userId, $village->id)->count(),
            'villageMissionsCount' => $village->missions()->count()
        ];
    }


    public static function isVillageCompleted($userId, $villageId){
        //Obtenemos todos los retos de esa misión
        $missions = Mission::MissionByVillageId($villageId)->get();

        if($missions->isEmpty()){
            return false;
        }

        //Asumimos que la missión está completa
        $villageComplete = true;

        //Lo recorremos en un arreglo para mandar los datos a la función
        //que evalúa si un reto se cumplió

        foreach ($missions as $mission) {
            //Si entra al bloque, al menos un reto no está completado, por lo tanto, la misión tampoco
            if(!Mission::isMissionCompleted($userId, $mission->id)){
                $villageComplete = false;
            }
        }

        return $villageComplete;
    }

    /*
        Scope que obtiene la aldea a partir del bloque
    */
    public function scopeVillageByBlockId($query, $id) {
        return $query->where("block_id", $id);
    }

    /*
        Scope que obtiene todas las aldeas a partir de un arreglo de ids de bloques
    */
    public function scopeVillageByBlockIdArray($query, $idArr) {
        return $query->whereIn("block_id", $idArr);
    }
}
