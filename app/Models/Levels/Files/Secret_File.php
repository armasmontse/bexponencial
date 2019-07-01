<?php

namespace App\Models\Levels\Files;

use Illuminate\Database\Eloquent\Model;

class Secret_File extends Model
{
    public $timestamps = false;

	/**
     * Creamos la relación de secret file con village
     */
    public function village()
    {
        return $this->belongsTo(
        	'App\Models\Levels\Village',
        	'village_id'
        );
    }

    /**
     * Creamos la relación de secret file con secret file contents
    */
    public function filesInfo()
    {
    	return $this->belongsToMany(
    		'App\Models\Levels\Files\File_Info',
    		'secret__file__contents',
    		'secret_file_id',
    		'file_info_id'
    	);
	}

    /*
        Scope que obtiene el archivo secreto
    */
    public function scopeSecretFile($query, $id) {
      return $query->where('village_id', $id);
   }

}
