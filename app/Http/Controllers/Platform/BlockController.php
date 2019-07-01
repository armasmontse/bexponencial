<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Models\Levels\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
	/*
		Función que obtiene todos los bloques con sus aldeas
	*/
	public function getBlocks($levelId){
		return Block::getSectionsByLevelId($levelId);
	}
}
