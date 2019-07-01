<?php

use App\Models\Users\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Address::create([
            'phone'=>'7221561234',
            'street' => 'Av unidad modelo',
            'street_no' => 'S/N',
            'neighbourhood' => 'Churubusco',
            'city' => 'CDMX',
            'state' => 'Ciudad de México',
            'zip_code' => '09992',
            'created_at' => '2018-10-29 00:00:00',
            'updated_at' => '2018-10-29 00:00:00'
        ]);

        Address::create([
          'phone'=>'7221561234',
              'street' => 'Av unidad modelo',
              'street_no' => 'S/N',
              'neighbourhood' => 'Churubusco',
              'city' => 'CDMX',
              'state' => 'Ciudad de México',
              'zip_code' => '09992',
              'created_at' => '2018-10-29 00:00:00',
              'updated_at' => '2018-10-29 00:00:00'
          ]);

          Address::create([
            'phone'=>'7221561234',
                'street' => 'Av unidad modelo',
                'street_no' => 'S/N',
                'neighbourhood' => 'Churubusco',
                'city' => 'CDMX',
                'state' => 'Ciudad de México',
                'zip_code' => '09992',
                'created_at' => '2018-10-29 00:00:00',
                'updated_at' => '2018-10-29 00:00:00'
            ]);

        //factory(Address::class)->times(20)->create();
    }
}
