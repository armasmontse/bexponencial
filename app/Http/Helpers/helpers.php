<?php
/**
 * verifica que si la  futa contiene el string buscado
 * @param  string  $page_slug slug de la pagina a pasar
 * @return boolean            si se encuentra en la fruta o no
 */
function is_page($route_name)
{
    return Route::currentRouteName() == $route_name;
}

/**
 * verifica que si la  futa contiene el string buscado
 * @param  string  $page_slug slug de la pagina a pasar
 * @return boolean            si se encuentra en la fruta o no
 */
function in_pages(array $route_names)
{
    return in_array(Route::currentRouteName(), $route_names);
}

/**
 * verifica que si la  futa contiene el string buscado
 * @param  string  $page_slug slug de la pagina a pasar
 * @return boolean            si se encuentra en la fruta o no
 */
function is_exact_page($route_name,array $parameters)
{
    return Request::url() == route($route_name,$parameters);
}

/**
 * encrypta el mail
 * @param  string $mail        mail encriptasrse
 * @return string              valor encriptado
 */
 function cltvoMailEncode($mail)
 {
     $iv = getIVKey();

     $key = config( "cltvo.encryption_key");

     return  base64url_encode( openssl_encrypt( $mail, Config::get('app.cipher'), md5($key), OPENSSL_RAW_DATA, $iv));
 }


/**
 * desencrypta el mail encryptado con la la funcion cltvoMailEnconde
 * @param  string $encodedMail mail encryptado con la la funcion cltvoMailEnconde
 * @return string              valor desencriptado
 */
 function cltvoMailDecode($mail_encoded)
 {
     $iv = getIVKey();

     $key = config( "cltvo.encryption_key");

     return openssl_decrypt( base64url_decode($mail_encoded), Config::get('app.cipher'), md5($key), OPENSSL_RAW_DATA, $iv);
 }

 function getIVKey()
{
    $app_key    = config('app.key');
    $cipher     = Config::get('app.cipher');
    $iv_lenght  = openssl_cipher_iv_length($cipher);
    $iv_base64  = explode(':', $app_key)[1];
    $iv         = base64_decode($iv_base64);

    return substr($iv, $iv_lenght);
}

function base64url_encode($data) {
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data) {
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}


/**
 * coleccion con la que vamos a traer elemntos aleatorios
 * @param  IlluminateDatabaseEloquentCollection $Colection coleccion de elenntos
 * @return IlluminateDatabaseEloquentCollection coleccion de elemntos aleatorios
 */
function getRandomElements(Illuminate\Database\Eloquent\Collection $Colection, $max = null)
{

    $ColectionRandom = new Illuminate\Database\Eloquent\Collection ;

    $ColectionRandNumber = rand( 0, $Colection->count() ) ;

    if ($max) {
        $ColectionRandNumber = min($ColectionRandNumber,$max);
    }

    if ( $ColectionRandNumber > 0 ) {

        $ColectionRandom = $Colection->random( $ColectionRandNumber ) ;

        if ( get_class($ColectionRandom) != "Illuminate\Database\Eloquent\Collection" ) {
            $ColectionRandom = (new Illuminate\Database\Eloquent\Collection)->add($ColectionRandom) ;
        }

    }

    return  $ColectionRandom;
}

/**
 * coleccion con la que vamos a traer elemntos aleatorios
 * @param  IlluminateDatabaseEloquentCollection $Colection coleccion de elenntos
 * @return IlluminateDatabaseEloquentCollection coleccion de elemntos aleatorios
 */
function getMaxNRandomElements(Illuminate\Database\Eloquent\Collection $Colection, $total)
{
	if ($total == 0) {
		return collect([]);
	}

	if ($Colection->count() < $total) {
		return $Colection;
	}

	if ($total == 1  ) {
		return collect($Colection->fisrt());
	}

	return $Colection->random($total);
}


function csvToArray($filename='', $delimiter=','){

    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $counter = 0;
    $header = NULL;
    $data = [];

    if ( ( $handle = fopen($filename, 'r') ) !== FALSE ){

        while ( ( $row = fgetcsv($handle, 1000, $delimiter) ) !== FALSE){

            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);

        }
        fclose($handle);
    }
    return $data;
}


function cltvoCurrentLanguageIso()
{
	return isset(config('app.available_langs')[ session('cltvo_lang')]) ? session('cltvo_lang') : config( 'app.locale');
}

function date_regex($day = false)
{
    $validation_year            = "2[0-9]{3}";
    $validation_month            = "0[0-9]|1[0-2]";

    $validation_31_day_months   = "(0[13578]|1[02])-([0-2][0-9]|3[01])";
    $validation_30_day_months   = "(0[469]|11)-([0-2][0-9]|30)";
    $validation_february        = "02-([0-1][0-9]|2[0-8])";
    $validation_leap_year       = "2[0-9]([02468][048]|[13579][26])-02-29";


    if ($day) {
        return "(".$validation_year."-((".$validation_31_day_months.")|(".$validation_30_day_months.")|(".$validation_february.")))|(".$validation_leap_year.")";
    }

    return '('.$validation_year.')-('.$validation_month.')';
}


function getMexicoStatesiWithMunicipies()
{
	return getMexicoStatesiAndMunicipiesFromCSV()->groupBy('NOM_ENT,C,110');
}

function getMexicoStatesiAndMunicipiesFromCSV()
{
	$csvFile = storage_path('app/cltvo/states/cat_municipio_ABR2016.csv');
	return collect(csvToArray($csvFile));
}


function sendFatalNotification($message)
{
	\App\Notifications\FatalNotification::NotUserNotify([
		'message' 	=> $message,
		'email' 	=> config("cltvo.fatal_error_mail"),
	]);
}

function isAGoogleFont($font_name)
{
	$handle = curl_init(getGoogleFontSource($font_name));
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_NOBODY, true);
	$result = curl_exec($handle);

	if ($result === false) {
		return false;
	}

	$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
	curl_close($handle);

	if ($httpCode == 200 ) {
	  return true;
	}

	return false;

}

function getGoogleFontSource($base_name)
{
	return config('google.fonts_source').getGoogleFontName($base_name);
}

function getGoogleFontName($base_name)
{
    return preg_replace('!\s+!', "+", trim($base_name) );
}

function explodeTranstationsLine($text)
{

    if (substr_count($text,"trans") == substr_count($text,getTransFindKey())) {
        return collect(explode("trans",$text ));
    }

	$lastPos = 0;
	$parts = [];

	while (($lastPos = strpos($text, getTransFindKey() , $lastPos))!== false) {
		$positions[] = $lastPos;
		$lastPos = $lastPos + strlen(getTransFindKey());
	}

	foreach ($positions as $key => $position) {
		$parts[] = substr($text, $position,isset($positions[$key+1])? $positions[$key+1] : strlen($text));
	}

	return collect($parts)->map(function($part){
		return str_replace(getTransFindKey(), "(", $part );
	});

}

function getTransFindKey()
{
	return "trans"."(";
}

function moneyFormat($value)
{
	return "$".number_format($value/100,2,".",",");
}

function percentFormat($value)
{
	return number_format($value,0,".",",")."%";
}

function getMontsName()
{
	return array_map(function($number){
		return (object) [
			"number"	=> $number,
			"label"		=> $number." ".date('F', mktime(0, 0, 0, $number, 10))
		];
	}, range(1,12));
}

function pxTo($px, $relation, $dpi)
{
    return ($relation / $dpi) * $px;
}

function pxToCm($px, $dpi = 0)
{
	if($dpi == 0){
		$dpi = config("cltvo.default_dpi", 72);
	}

    return pxTo($px, 2.54, $dpi);
}

function cmToPx($cm, $dpi = 0)
{
	return round( $cm  / pxToCm(1, $dpi) );
}

function validateSvgsAspectRatio(Illuminate\Http\UploadedFile $cutline, $width, $height )
{
	try {
		$xml = simplexml_load_file($cutline);
		$view_box = (string) $xml->attributes()["viewBox"] ;
	} catch (Exception $e) {
		return false;
	}

	$parts = explode(" ", $view_box);


	if (count($parts) != 4) {
		return false;
	}

	$ratio = ($parts[2] - $parts[0]) / ($parts[3] - $parts[1]);

	if ($height == 0) {
		return false;
	}

	return abs($ratio-$width/$height) <= 0.002;

}
