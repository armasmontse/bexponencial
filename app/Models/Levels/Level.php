<?php

namespace App\Models\Levels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Levels\Block;
use App\Models\Levels\Mission;
use App\Models\Levels\Village;
use App\Models\Levels\Challenges\Challenge;

class Level extends Model
{
    public $timestamps = false;
    /**
     * Creamos la relación de blocks con missions
    */
    public function blocks()
    {
        return $this->hasMany(
        	'App\Models\Levels\Block',
        	'level_id'
        );
    }


    public static function ProgressInfo($user){


      $blocks = Block::getBlocksByLevel(self::all(),$user);

      return $blocks;
      //  return $villagesProgressArray;//$villagesProgress;
    }

    public static function getPrincipalSections(){
        $levels = Level::all();
        $sections = [];

        foreach ($levels as $level) {
            $blocks = [];
            $blocksByLevel = $level->blocks()->with('villages')->get();

            foreach ($blocksByLevel as $block) {
                $blocks[$block->id] = [
                    'name' => $block->label,
                    'villages' => $block->villages->pluck('label')
                ];
            }

            $sections[$level->id] = [
                'name' => $level->label,
                'blocks' => $blocks
            ];
        }
        return $sections;
    }
}
