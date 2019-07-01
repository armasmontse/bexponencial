<?php namespace App\Models\Traits\Files;

use App\Models\Traits\Files\PathsTrait;
use App\Models\Traits\Files\FileTrait;
use App\Models\Traits\Files\ThumbnailFileTrait;

use Illuminate\Http\UploadedFile;

use Image;
use Storage;
use Exception;

trait ImagesTrait {

	use FileTrait;
	use ThumbnailFileTrait;
	use PathsTrait;


    public static function createImageFile(UploadedFile $img_file)
    {
        $file_path = $img_file->store(static::STORAGE_PATH);

        if (!$file_path) {
            return ;
        }

		if (!static::createThumbnailsImageFile(storage_path("app/".$file_path) )) {
			Storage::delete($file_path);
			return ;
		}

        return $file_path;
    }

	public static function createThumbnailsImageFile($image_path)
	{
		try {
			$imageFile = Image::make( $image_path );

			$imageFile->resize(static::THUMBNAILS_SIZE, null, function ($constraint) {
				$constraint->aspectRatio();
			});

			$thumbnail_path = static::getThumbnailsFilesPath()."/".$imageFile->basename;

			$imageFile->save( $thumbnail_path );

		} catch (Exception $e) {
			return ;
		}

		return $thumbnail_path;
	}



	/**
	 * borra losarchivos de una imagen
	 * @return boolean true en caso de borrar ambos archivos
	 */
	public function deleteFiles()
	{
		return $this->deleteThumbnailFile() && $this->deleteFile()  ;
	}

}
