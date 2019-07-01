<?php

use App\Models\Levels\Block;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Block::create([
            'label'=>'Tu Mundo',
            'description' => 'Av unidad modelo',
            'level_id' => 1,
        ]);

      Block::create([
        'label'=>'Tu Persona',
        'description' => 'Av unidad modelo',
        'level_id' => 1,
        ]);



        //factory(Block::class)->times(20)->create();
    }
}
