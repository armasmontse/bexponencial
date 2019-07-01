<?php

use App\Models\Users\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p=Permission::create([
            'slug'=>'admin_access',
            'label' => 'Acceso usuario administrador',
            'created_at' => '2018-10-29 00:00:00',
    		    'updated_at' => '2018-10-29 00:00:00'
        ]);
        $p->roles()->sync(['1']);
        $p=Permission::create([
            'slug'=>'manage_users',
            'label' => 'Gestión de usuarios',
            'created_at' => '2018-10-29 00:00:00',
    		    'updated_at' => '2018-10-29 00:00:00'
        ]);
        $p->roles()->sync(['1']);
    	  $p=Permission::create([
            'slug'=>'student_access',
            'label' => 'Acceso usuario estudiante',
            'created_at' => '2018-10-29 00:00:00',
    		    'updated_at' => '2018-10-29 00:00:00'
        ]);
        $p->roles()->sync(['2']);
        $p=Permission::create([
          'slug'=>'parent_access',
          'label' => 'Acceso usuario padre',
          'created_at' => '2018-10-29 00:00:00',
  		    'updated_at' => '2018-10-29 00:00:00'
          ]);
        $p->roles()->sync(['3']);



        //factory(Permission::class)->times(20)->create();
    }
}
