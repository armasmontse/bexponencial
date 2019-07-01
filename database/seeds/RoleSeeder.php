<?php

use App\Models\Users\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'slug'=>'admin',
            'label' => 'Rol admin',
            'created_at' => '2018-10-29 00:00:00',
    		    'updated_at' => '2018-10-29 00:00:00'
        ]);
    	Role::create([
            'slug'=>'student',
            'label' => 'Rol estudiante',
            'created_at' => '2018-10-29 00:00:00',
    		    'updated_at' => '2018-10-29 00:00:00'
        ]);

        Role::create([
          'slug'=>'padre',
          'label' => 'Rol padre',
          'created_at' => '2018-10-29 00:00:00',
          'updated_at' => '2018-10-29 00:00:00'
          ]);



        //factory(Role::class)->times(20)->create();
    }
}
