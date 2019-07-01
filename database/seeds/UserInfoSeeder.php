<?php

use App\Models\Users\User_Info;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User_Info::create([
		    'user_id' => 1,
		    'address_id' => 0,
		    'full_Name' => '',
		    'birth_date' => '2018-10-16',
        'photo' => 'empty.png',
		    'created_at' => '2018-10-26 00:00:00',
		    'updated_at' => '2018-10-26 00:00:00'
        ]);
        User_Info::create([
		    'user_id' => 2,
		    'address_id' => 1,
		    'full_Name' => 'David Flores',
		    'birth_date' => '2018-10-16',
        'photo' => 'empty.png',
		    'created_at' => '2018-10-26 00:00:00',
		    'updated_at' => '2018-10-26 00:00:00'
        ]);


        User_Info::create([
		    'user_id' => 3,
		    'address_id' => 2,
		    'full_Name' => 'Toño Figueroa',
		    'birth_date' => '2018-10-11',
        'photo' => 'empty.png',
		    'created_at' => '2018-10-29 00:00:00',
		    'updated_at' => '2018-10-29 00:00:00']);

        User_Info::create([
        'user_id' => 4,
        'address_id' => 3,
        'full_Name' => 'Natasha nati',
        'birth_date' => '2018-10-11',
        'photo' => 'empty.png',
        'created_at' => '2018-10-29 00:00:00',
        'updated_at' => '2018-10-29 00:00:00'
		]);



    }
}
