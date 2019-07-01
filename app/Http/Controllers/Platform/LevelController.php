<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Models\Levels\Block;
use App\Models\Levels\Challenges\Answer;
use App\Models\Levels\Challenges\Challenge;
use App\Models\Levels\Level;
use App\Models\Levels\Mission;
use App\Models\Levels\Village;
use Illuminate\Http\Request;

class LevelController extends Controller
{

	/*
		Fucnión que regresa todos los niveles
	*/

	public function getLevels(){
		return Level::all();
	}
}
