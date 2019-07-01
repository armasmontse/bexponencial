<?php

use App\Models\Users\Skill;
use App\Models\Levels\Challenges\Challenge;
use Illuminate\Database\Seeder;
class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $challenges = Challenge::all()->pluck("id");
    	$skill=Skill::create([
            'label'=>'Autoconocimiento',
            'max_points'=> 128
        ]);
        $skill->challenges()->sync($challenges);
        $skill=Skill::create([
            'label'=>'Compromiso Social',
            'max_points'=> 64
          ]);
        $skill->challenges()->sync($challenges);
        $skill=Skill::create([
              'label'=>'Creatividad',
              'max_points'=> 180
        ]);
        $skill->challenges()->sync($challenges);
        $skill=Skill::create([
              'label'=>'Pensamiento crítico',
              'max_points'=> 192
        ]);
        $skill->challenges()->sync($challenges);
        $skill=Skill::create([
              'label'=>'Liderazgo',
              'max_points'=> 32
        ]);
        $skill->challenges()->sync($challenges);
        $skill=Skill::create([
              'label'=>'Trabajo en equipo',
              'max_points'=> 4
        ]);
        $skill->challenges()->sync($challenges);
        $skill=Skill::create([
              'label'=>'Compañerismo',
              'max_points'=> 72
        ]);
        $skill->challenges()->sync($challenges);
        $skill=Skill::create([
              'label'=>'Asertividad',
              'max_points'=> 256
        ]);
        $skill->challenges()->sync($challenges);

    }
}
