<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Users\Plans\User_Payment_Method;

use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Traits\WebhookConektaTrait;


use App\Notifications\Users\SubscriberPlanNotification;

class UserPlanController extends Controller
{
	use WebhookConektaTrait;

	public function webhookResponse(Request $request)
	{
		//Obtenemos el evento
		$event = $request->all();

		//Evaluamos el evento que nos trae
		switch ($event['data']['object']['object']) {
		    case 'customer':
		    	Log::info($event['data']['object']['object']);

		        break;
		    case 'subscription':
		    	//Enviamos los datos del evento para evaluarlos
		    	static::responseSubscription($event['data']);
		    	Log::info($event['data']['object']);
		        break;
		    case 'charge':

		    	Log::info($event['data']);
		        break;
		    case 'plan':
		    	Log::info($event['data']['object']['object']);
		        break;
		    default:
		    	Log::info('----------- Pintamos el response cuando no entra a ninguno ----------');
		    	Log::info($event);
		    	break;
		}
	}
}
