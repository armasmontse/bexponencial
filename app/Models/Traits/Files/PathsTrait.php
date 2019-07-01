<?php namespace App\Models\Traits\Files;


use File;

trait PathsTrait {

	/**
	 * Crea si no existe una carpeta
	 * @param  string $path carpeta a verificar
	 * @return string       carpeta a verificar
	 */
	public static function existsOrCreatePath($path)
	{
		File::exists($path) or File::makeDirectory($path);
		return $path;
	}

}
