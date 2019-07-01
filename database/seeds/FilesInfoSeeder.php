<?php

use App\Models\Levels\Files\File_Info;
use Illuminate\Database\Seeder;

class FilesInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File_Info::create([
	        'title' => 'Archivo secreto 1',
	        'file_name' => 'Secretos aldea 1',
	        'url' => 'archivo_secreto_1_1.jpg',
	        'description' => 'Archivo secreto número 1 para la aldea número 1',
	        'type' => 'jpg'
        ]);

        File_Info::create([
	        'title' => 'Archivo secreto 2',
	        'file_name' => 'Secretos 2 en aldea 1',
	        'url' => 'archivo_secreto_2_1.pdf',
	        'description' => 'Archivo secreto número 2 para la aldea número 1',
	        'type' => 'pdf'
        ]);

        File_Info::create([
	        'title' => 'Archivo secreto 3',
	        'file_name' => 'Secretos 1 en aldea 2',
	        'url' => 'archivo_secreto_1_2.jpg',
	        'description' => 'Archivo secreto número 1 para la aldea número 2',
	        'type' => 'jpg'
        ]);

        File_Info::create([
	        'title' => 'Archivo secreto 4',
	        'file_name' => 'Secretos 1 en aldea 3',
	        'url' => 'archivo_secreto_1_3.jpg',
	        'description' => 'Archivo secreto número 1 para la aldea número 3',
	        'type' => 'jpg'
        ]);

        File_Info::create([
	        'title' => 'Archivo secreto 5',
	        'file_name' => 'Secretos 1 en aldea 4',
	        'url' => 'archivo_secreto_1_4.pdf',
	        'description' => 'Archivo secreto número 1 para la aldea número 4',
	        'type' => 'pdf'
        ]);
    }
}
