<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use App\Language;

class Country extends Model
{





    public static function getMexicoStates()
    {
        return static::getMexicoStatesiWithMunicipies()->keys();
    }

    public static function getMexicoStatesiWithMunicipies()
    {
        return static::getMexicoStatesiAndMunicipiesFromCSV()->sort(function ($a, $b) {
            if ($a['state_slug'] === $b['state_slug']) {
                if ($a['mun_slug'] === $b['mun_slug']) {
                    return 0;
                }
                return $a['mun_slug'] < $b['mun_slug'] ? -1 : 1;
            }
            return $a['state_slug'] < $b['state_slug'] ? -1 : 1;
        })->groupBy('NOM_ENT');
    }

    public static function getMexicoStatesiAndMunicipiesFromCSV()
    {
        $csvFile = storage_path('app/cltvo/states/ARCH922.csv');
        return collect(static::getMexicoStatesFormCSV($csvFile));
    }


	public static function getMexicoZipCodesFast()
	{
		$csvFile = storage_path('app/cltvo/states/zipcodes_fast.csv');// solo los codigos
		return collect(static::getMexicoZipCodesFromCSV($csvFile));
	}

    public static function getMexicoZipCodes()
	{
		$csvFile = storage_path('app/cltvo/states/CPdescarga.csv');// con toda la info
		return collect(static::getMexicoZipCodesFromCSV($csvFile));
	}


	public static function getMexicoZipCodesFromCSV($filename='', $delimiter=',')
	{

	    if(!file_exists($filename) || !is_readable($filename)){
			return FALSE;
		}

	    $counter = 0;
	    $header = NULL;
	    $data = [];

	    if ( ( $handle = fopen($filename, 'r') ) !== FALSE ){

	        while ( ( $row = fgetcsv($handle, 1000, $delimiter) ) !== FALSE){

	            if(!$header){
	                $header = $row;
	            }else{
	                $data[] = array_combine($header, $row);
	            }


	        }
	        fclose($handle);
	    }
	    return $data;
	}

	public static function getMexicoStatesFormCSV($filename='', $delimiter=',')
	{

	    if(!file_exists($filename) || !is_readable($filename)){
			return FALSE;
		}

	    $counter = 0;
	    $header = NULL;
	    $data = [];

	    if ( ( $handle = fopen($filename, 'r') ) !== FALSE ){

	        while ( ( $row = fgetcsv($handle, 1000, $delimiter) ) !== FALSE){

	            if(!$header){
	                $row[] = 'state_slug';
	                $row[] = 'mun_slug';
	                $header = $row;
	            }else{
	                $row[] = str_slug($row[0]);
	                $row[] = str_slug($row[1]);
	                $data[] = array_combine($header, $row);
	            }


	        }
	        fclose($handle);
	    }
	    return $data;
	}

	public function minified()
	{
		return (object) [
			"id"				=> $this->id,
			"official_name"		=> $this->official_name,
		];
	}


}
