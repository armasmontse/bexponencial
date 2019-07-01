<?php namespace App\Models\Traits\Files;

use Storage;

trait ThumbnailFileTrait {

	/**
	* Crea si no existe la carpeta donde se guardara la Thumbnail la imagen
	* @return string   directorio de la Thumbnail la imagen
	*/
	public static function getThumbnailsFilesPath()
	{
		$thumbnails_path = storage_path("app/". static::THUMBNAILS_STORAGE_PATH );
		return  static::existsOrCreatePath($thumbnails_path);
	}

	/**
	 * url de la imagen
	 * @return string url de la imagen
	 */
	public function getThumbnailPublicPath()
	{
		$public_path = str_replace("public", "storage", static::THUMBNAILS_STORAGE_PATH);
		return str_replace(static::STORAGE_PATH,$public_path,  $this->filename);
	}

	public function getThumbnailUrlAttribute()
	{
		return url($this->getThumbnailPublicPath());
	}

	/**
	 * url de la imagen
	 * @return string url de la imagen
	 */
	public function getThumbnailFilenameAttribute()
	{
		return str_replace(static::STORAGE_PATH, static::THUMBNAILS_STORAGE_PATH, $this->filename);
	}

	/**
	 * borra losarchivos de una imagen
	 * @return boolean true en caso de borrar ambos archivos
	 */
	public function deleteThumbnailFile()
	{
		return Storage::delete($this->thumbnail_filename)  ;
	}
	
}
