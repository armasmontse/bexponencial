<?php

namespace App\Models\Levels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Block extends Model
{
    public $timestamps = false;
    /**
     * Creamos la relación de blocks con missions
    */
    public function villages()
    {
        return $this->hasMany(
            'App\Models\Levels\Village',
            'block_id'
        );
    }

    /**
     * Creamos la relación de blocks con level
    */
    public function levels()
    {
        return $this->belongsTo(
            'App\Models\Levels\Level',
            'level_id'
        );
    }

    public static function getBlocksByLevel($levels, $user)
    {
        $nivel =array();
        $isLevelCompleted=true;
        foreach ($levels as $level) {
            $blocks =array();
            $isBlockCompleted=true;
            foreach ($level->blocks as $key=> $block) {
                $villages = array();
                $mc=0;
                $mt=0;
                $percentage=0;
                foreach ($block->villages as $key=> $village) {
                    $blocks[$block->id]["villages"][$village->id]=Village::MapProgressInfo($user, $village);
                    $mc += $blocks[$block->id]["villages"][$village->id]["villageMissionsFinishedCount"];
                    $mt += $blocks[$block->id]["villages"][$village->id]["villageMissionsCount"];
                    //$villages[$village->id] = Village::MapProgressInfo($user,$village->id);
                }
                if ($mt!=0) {
                    $percentage = ($mc * 100)/$mt;
                }

                $blocks[$block->id]["name"]=$block->label;
                $blocks[$block->id]["percentage"]=number_format($percentage, 0);
                if ($isBlockCompleted) {
                    $blocks[$block->id]["isAccesible"]=true;
                } else {
                    $blocks[$block->id]["isAccesible"]=false;
                }
                if ($percentage==100) {
                    $isBlockCompleted=true;
                } else {
                    $isBlockCompleted=false;
                }
            }

            $nivel[$level->id]=["name"=>$level->label,"blocks"=>$blocks, "isAccesible"=>$isLevelCompleted];
            if($isBlockCompleted && sizeof($level->blocks)>0){
                $isLevelCompleted=true;
            }else{
                $isLevelCompleted=false;
            }

        }

        return $nivel;
    }

    public static function getSectionsByLevelId($levelId)
    {
        $blocks = static::BlocksByLevelId($levelId)->with('villages')->get();
        $sections =array();
        foreach ($blocks as $block) {
            $villages = [];
            $villageMissions = $block->villages()->with('missions')->get();

            foreach ($villageMissions as $village) {
                $villages[$village->id] = [
                    'name' => $village->label,
                    'missions' => $village->missions
                ];
            }

            $sections[$block->id] = [
                'name' => $block->label,
                'villages' => $villages
            ];
        }

        return $sections;
    }

    /*
        Función que obtiene todas las aldeas apartir de un arreglo de bloques
    */
    public static function getVillagesByBlockArray($idArr)
    {
        return Village::VillageByBlockIdArray($idArr);
    }

    /*
        Scope que obtiene los bloques a partir del nivel
    */
    public function scopeBlocksByLevelId($query, $id)
    {
        return $query->where("level_id", $id);
    }
}
