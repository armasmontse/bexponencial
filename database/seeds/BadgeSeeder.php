<?php

use App\Models\Users\Badge;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Badge::create([
            'label' => 'insignia 1',
        ]);

        Badge::create([
            'label' => 'insignia 2',
          ]);
        Badge::create([
              'label' => 'insignia 3',
            ]);



        //factory(Block::class)->times(20)->create();
    }
}
