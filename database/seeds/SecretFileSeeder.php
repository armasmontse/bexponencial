<?php

use App\Models\Levels\Files\Secret_File;
use Illuminate\Database\Seeder;

class SecretFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Secret_File::create([
	        'village_id' => 1,
	        'description' => 'Texto de descripción del archivo secreto número 1',
	        'price' => 50
        ]);

        Secret_File::create([
	        'village_id' => 2,
	        'description' => 'Texto de descripción del archivo secreto número 2',
	        'price' => 100
        ]);

        Secret_File::create([
	        'village_id' => 3,
	        'description' => 'Texto de descripción del archivo secreto número 3',
	        'price' => 150
        ]);

        Secret_File::create([
	        'village_id' => 4,
	        'description' => 'Texto de descripción del archivo secreto número 4',
	        'price' => 200
        ]);
    }
}
