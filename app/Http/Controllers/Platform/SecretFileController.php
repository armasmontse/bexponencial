<?php

namespace App\Http\Controllers\Platform;


use App\Http\Controllers\Controller;
use App\Models\Levels\Files\File_Info;
use App\Models\Levels\Files\Secret_File;
use App\Models\Logs\Purchase_Log;
use App\Models\Users\User;
use Illuminate\Http\Request;

class SecretFileController extends Controller
{
	/*
		Función que muestra el archivo secreto y sus datos
	*/
    public function showPriceFile($villageId){
        $coins = 0;
        $user = $this->user;

        //Obtenemos el archivo secreto a través de un scope
    	$secretFile = Secret_File::secretFile($villageId)->first();

        //Buscamos los archivos relacionados
    	$secretFilesInfo = Secret_File::find($secretFile->id)->filesInfo()->get();

        //Buscamos si el usuario ha comprado el archivo secreto
        $showFile = Purchase_Log::isPurchasedItem($user->id, $secretFile->id, 'secret_files');

        //Evaluamos si el usuario tiene estadísticas
        if(!empty($user->stats()->first())){
            $coins = $user->stats()->first()->coins;
        }

    	return [
    		'villageName' => $secretFile->village->label,
    		'filePrice' => (int)$secretFile->price,
    		'fileDesc' => $secretFile->description,
    		'userCoins' => (int)$coins,
            'filesInfo' => $secretFilesInfo,
            'showFile' => $showFile
    	];
    }

    /*
        Función que compra el archivo secreto
    */
    public function purchaseSecretFile($itemId){
        $user = $this->user;

        //Obtenemos las estadísticas del usuario
        $userStats = $user->stats()->first();

        //Obtenemos el precio del archivo
        $secretFilePrice = Secret_File::secretFile($itemId)
            ->first()
            ->value('price');

        $difference = $userStats->coins - $secretFilePrice;

        //Preguntamos si la resta es mayor a cero, y se se guardó la compra en la base
        if($difference >= 0 &&
            Purchase_Log::purchaseSecretFile($user->id, $itemId, 'secret_files')){
            //Descontamos las monedas de los stats de usuario
            $user->stats()->update([
                'coins' => $difference,
            ]);

            return ['showFile' => true];
        }

        return response()->json(['errors' => 'Hubo un problema al comprar el archivo'], 400);
    }
}
