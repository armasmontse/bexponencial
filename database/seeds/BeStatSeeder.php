<?php

use App\Models\Users\Be_Stat;
use Illuminate\Database\Seeder;

class BeStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Be_Stat::create([
            'user_id'=>2,
            'coins' => 0,
            'exp_points' => 0,
            'created_at' => '2018-10-26 00:00:00',
		    'updated_at' => '2018-10-26 00:00:00'
        ]);

        Be_Stat::create([
            'user_id'=>3,
            'coins' => 0,
            'exp_points' => 0,
            'created_at' => '2018-10-26 00:00:00',
            'updated_at' => '2018-10-26 00:00:00'
          ]);
          Be_Stat::create([
              'user_id'=>4,
              'coins' => 0,
              'exp_points' => 0,
              'created_at' => '2018-10-26 00:00:00',
              'updated_at' => '2018-10-26 00:00:00'
            ]);



        //factory(Block::class)->times(20)->create();
    }
}
