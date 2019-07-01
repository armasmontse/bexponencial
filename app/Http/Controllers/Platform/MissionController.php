<?php

namespace App\Http\Controllers\Platform;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Levels\Mission;
use App\Models\Levels\Challenges\Challenge;

class MissionController extends Controller
{
    public function getChallenges($mission){
        $mission= Mission::findorfail($mission);
        parent::LogDebug("Prueba: ".$mission->label);
        $temp=$mission->challenges()->get();
        $challenges= array();
        foreach($temp as $ch){
            $item = ["id"=>$ch->id,"label"=>$ch->challenge_type->label,"coins"=>$ch->coins,"exp_points"=>$ch->exp_points];
            array_push($challenges, $item);

        }

        return ["name"=>$mission->label,"desc"=>$mission->desc_one,"challenges"=>$challenges];
    }
}
