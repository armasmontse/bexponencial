<?php

namespace App\Models\Levels\Challenges;

use Illuminate\Database\Eloquent\Model;

class Challenge_Type extends Model
{
    public $timestamps = false;

    public function challenges(){
        return $this->hasMany(
        	'App\Models\Levels\Challenges\Challenge',
        	'challenge_type_id'
        );
    }
}
