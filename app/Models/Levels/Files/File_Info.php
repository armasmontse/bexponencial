<?php

namespace App\Models\Levels\Files;

use Illuminate\Database\Eloquent\Model;

class File_Info extends Model
{
	protected $table = 'files__info';
    public $timestamps = false;

    /**
     * Creamos la relación de file_info con secret file
    */

    public function secretFiles()
    {
    	return $this->belongsToMany(
    		'App\Models\Levels\Files\Secret_File',
    		'secret__file__contents',
    		'file_info_id',
    		'secret_file_id'
    	);
	}
}
