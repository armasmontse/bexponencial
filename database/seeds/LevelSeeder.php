<?php

use App\Models\Levels\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Level::create([
            'label'=>'Encuentra',
        ]);

        Level::create([
          'label'=>'Crece',
        ]);

        Level::create([
            'label'=>'Actúa',
        ]);

        //factory(Level::class)->times(20)->create();
    }
}
