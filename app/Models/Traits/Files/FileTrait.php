<?php namespace App\Models\Traits\Files;

use Storage;

trait FileTrait {

	/**
	 * url de la imagen
	 * @return string url de la imagen
	 */
	public function getPublicPath($storage_path = null, $filename_attribute = null)
	{
		$storage_path = $storage_path ? $storage_path : static::STORAGE_PATH;
		$public_path = str_replace("public", "storage", $storage_path );

		return str_replace($storage_path ,$public_path,  $this->{$filename_attribute ? $filename_attribute : "filename"});
	}

	public function getUrlAttribute()
	{
			return $this->getFileUrl();
	}

	public function getFileUrl($storage_path = null, $filename_attribute = null)
	{
		return url($this->getPublicPath($storage_path,$filename_attribute));
	}

	/**
	 * Crea si no existe de las imagenes
	 * @return string           ruta
	 */
	public static function getFilesPath($storage_path = null)
	{
		$storage_path = $storage_path ? $storage_path : static::STORAGE_PATH;
		return static::existsOrCreatePath( storage_path("app/".$storage_path) ) ;
	}

	/**
	 * borra losarchivos de una imagen
	 * @return boolean true en caso de borrar ambos archivos
	 */
	public function deleteFile($filename_attribute = null)
	{
		return Storage::delete($this->{$filename_attribute ? $filename_attribute : "filename"})  ;
	}

}
