<?php

use App\Models\Levels\Files\Secret_File_Content;
use Illuminate\Database\Seeder;

class SecretFileContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Secret_File_Content::create([
	        'secret_file_id' => 1,
	        'file_info_id' => 1
        ]);

        Secret_File_Content::create([
	        'secret_file_id' => 1,
	        'file_info_id' => 2
        ]);

        Secret_File_Content::create([
	        'secret_file_id' => 2,
	        'file_info_id' => 1
        ]);

        Secret_File_Content::create([
	        'secret_file_id' => 3,
	        'file_info_id' => 1
        ]);

        Secret_File_Content::create([
	        'secret_file_id' => 4,
	        'file_info_id' => 1
        ]);
    }
}
