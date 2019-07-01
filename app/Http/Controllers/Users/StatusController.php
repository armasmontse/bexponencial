<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\Logs\Action_Log;
use App\Models\Levels\Level;
use App\Models\Users\User;
use App\Models\Users\Skill;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function getAchievementsInfo(){
        $achievements = User::Achievements($this->user);
        $activities= Action_Log::where("user_id",$this->user->id)->take(10)->orderBy("created_at")->get();
        $skills = Skill::MapSkills($this->user->skills);
         return [
             $achievements,$activities,$skills
         ];
    }
    public function getProgress(){
        $progress= Level::ProgressInfo($this->user);
        //parent::LogObject($test);
        return($progress);

    }

    public function getRanking($filter){
        return User::UserRanking($filter);
        //parent::LogObject($test);
        //return User::UserRanking($filter);

    }
}
