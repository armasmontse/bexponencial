<?php

use App\Models\Levels\Challenges\Question_Type;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Question_Type::create([
        	'type' => 'Texto abierto',
        	'allowed_content' => 'text'
        ]);

		Question_Type::create([
        	'type' => 'Link',
        	'allowed_content' => 'link'
        ]);

		Question_Type::create([
        	'type' => 'PDF',
        	'allowed_content' => 'pdf'
        ]);

        Question_Type::create([
        	'type' => 'Imagen',
        	'allowed_content' => 'jpg, png, jpeg'
        ]);

        Question_Type::create([
        	'type' => 'Multiopción (PDF, link, texto abierto)',
        	'allowed_content' => 'pdf, link, text'
        ]);

        Question_Type::create([
        	'type' => 'Multiopción (PDF, texto abierto)',
        	'allowed_content' => 'pdf, text'
        ]);

        Question_Type::create([
        	'type' => 'Multiopción (link, texto abierto)',
        	'allowed_content' => 'link, text'
        ]);

        Question_Type::create([
        	'type' => 'Multiopción (PDF, link)',
        	'allowed_content' => 'pdf, link'
        ]);

        Question_Type::create([
        	'type' => 'Multiopción (texto abierto, imagen)',
        	'allowed_content' => 'text, jpg, png'
        ]);

		Question_Type::create([
        	'type' => 'Multiopción (texto abierto, url, pdf, imagen)',
        	'allowed_content' => 'text, link, pdf, jpg, png, jpeg'
        ]);

        Question_Type::create([
        	'type' => 'Opción Múltiple',
        	'allowed_content' => 'No definido'
        ]);

    }
}
