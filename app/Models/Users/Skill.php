<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\Skill;
use App\Models\Levels\Challenges\Challenge;

class Skill extends Model
{
    protected $fillable = ['label'];
    public $timestamps = false;
    public function users()
    {
        return $this->belongsToMany('App\Models\Users\User');
    }
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class)->withPivot('value');
    }
    public static function SyncSkills($user){
        $skills = self::All()->pluck("id");
        $user->skills()->sync($skills);
    }
    public static function MapSkills($skills){
        $skills= $skills->map(function ($skill) {

            $percentage= ($skill->pivot->value*100)/$skill->max_points;
            return ["label"=>$skill->label,"percentage"=>$percentage,"completed"=>number_format($skill->pivot->value,0)."/".number_format($skill->max_points,0)];
        })->reject(function ($skill) {
                return empty($skill);
        });
        return $skills;
    }
}
