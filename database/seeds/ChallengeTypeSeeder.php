<?php

use App\Models\Levels\Challenges\Challenge_Type;
use Illuminate\Database\Seeder;

class ChallengeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Challenge_Type::create([
        	'label' => 'Cuestiona'
        ]);

        Challenge_Type::create([
        	'label' => 'Explora'
        ]);

        Challenge_Type::create([
        	'label' => 'Analiza'
        ]);

        Challenge_Type::create([
        	'label' => 'Visita'
        ]);

        Challenge_Type::create([
        	'label' => 'Actúa'
        ]);

        Challenge_Type::create([
        	'label' => 'Mi experiencia'
        ]);
        
        Challenge_Type::create([
        	'label' => 'Localiza'
        ]);
    }
}
