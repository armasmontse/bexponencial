<?php

use App\Models\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
	        'user_name' => 'admin',
	        'email' => 'admin@elcultivo.mx',
	        'password' => bcrypt('12345678'),
	        'active' => 1,
	        'remember_token' => str_random(10),
	        'created_at' => '2018-10-29 00:00:00',
	        'updated_at' => '2018-10-29 00:00:00'
        ]);
        $user->roles()->sync(['1']);
        $user->skills()->sync(['1','2','3','4','5','6','7','8']);
        $user=User::create([
        	'user_name' => 'davidxflo',
	        'email' => 'davidxflo@gmail.com',
	        'password' => bcrypt('12345678'),
	        'active' => 1,
	        'remember_token' => str_random(10),
	        'created_at' => '2018-10-26 00:00:00',
	        'updated_at' => '2018-10-26 00:00:00'
        ]);
        $user->roles()->sync(['2']);
        $user->skills()->sync(['1','2','3','4','5','6','7','8']);
        $user=User::create([
	        'user_name' => 'Tonio-figueroa',
	        'email' => 'antonio@bexponencial.mx',
	        'password' => bcrypt('12345678'),
	        'active' => 1,
	        'remember_token' => str_random(10),
	        'created_at' => '2018-10-29 00:00:00',
	        'updated_at' => '2018-10-29 00:00:00'
        ]);
        $user->roles()->sync(['2']);
        $user->skills()->sync(['1','2','3','4','5','6','7','8']);
        $user=User::create([
	        'user_name' => 'nati-natasha',
	        'email' => 'natasha@elcultivo.mx',
	        'password' => bcrypt('12345678'),
	        'active' => 1,
	        'remember_token' => str_random(10),
	        'created_at' => '2018-10-29 00:00:00',
	        'updated_at' => '2018-10-29 00:00:00'
        ]);
        $user->roles()->sync(['2']);
        $user->skills()->sync(['1','2','3','4','5','6','7','8']);
        //factory(User::class)->times(13)->create();
    }
}
