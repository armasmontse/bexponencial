<?php

use App\Models\Levels\Village;
use Illuminate\Database\Seeder;

class VillagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Village::create([
            'label' => 'Hunab - Ku',
            'block_id' => 1,
            "coordinates"=>"lala",
            "mobile_coordinates"=>"2078,1491,NaN"
        ]);

        Village::create([
            'label' => 'Ixchel',
            'block_id' => 1,
            "coordinates"=>"lala",
            "mobile_coordinates"=>"2078,1491,NaN"
        ]);

        Village::create([
            'label' => 'Zamná',
            'block_id' => 1,
            "coordinates"=>"lala",
            "mobile_coordinates"=>"2078,1491,NaN"
        ]);

        Village::create([
            'label' => 'Yum Kaax',
            'block_id' => 1,
            "coordinates"=>"lala",
            "mobile_coordinates"=>"2078,1491,NaN"
        ]);
    }
}
