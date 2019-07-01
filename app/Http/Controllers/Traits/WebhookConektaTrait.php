<?php

namespace App\Http\Controllers\Traits;

use App\Http\Controllers\Traits\ConektaTrait;
use App\Http\Helpers\Conekta\CltvoConektaCustomer;
use App\Http\Helpers\Conekta\CltvoConektaEvent;
use App\Http\Helpers\Conekta\CltvoConektaOrder;
use App\Http\Helpers\Conekta\CltvoConektaPaymentSources;
use App\Http\Helpers\Conekta\CltvoConektaPlan;
use App\Http\Helpers\Conekta\CltvoConektaSubscriptions;

use App\Http\Helpers\Orders\CustomersHelper;
use App\Http\Helpers\Orders\DiscountsHelper;
use App\Http\Helpers\Orders\OrderHelper;

use App\Models\Users\Plans\User_Payment_Method;
use App\Models\Users\User;

use Carbon\Carbon;

use Conekta\Customer as ConektaCustomer;
use Conekta\Event as ConektaEvent;
use Conekta\Order as ConektaOrder;
use Conekta\PaymentSource as ConektaPaymentSource;
use Conekta\Plan as ConektaPlan;

use App\Notifications\Users\SubscriberPlanNotification;

use Exception;


use Illuminate\Support\Facades\Log;

trait WebhookConektaTrait {

	use ConektaTrait;

	/*
		Función que evalúa el evento específico de la suscripción
	*/
	protected function responseSubscription($dataEvent){
		//Evaluamos el status de la suscripción
		switch ($dataEvent['object']['status']) {
		    case 'active':
		    	//Si se activó la suscripción
		    	static::activeSubscription($dataEvent['object']);
		        break;
		    case 'canceled':
		    	//Enviamos los datos del evento para evaluarlos
		    	static::canceledSubscription($dataEvent);
		        break;
		    case 'past_due':
		    	//Cuando se vence, deshabilitamos el usuario
		    	Log::info('------------No pasa la tarjeta---------------');
		    	break;
	    }
	}

	/*
		Función que procesa todo lo necesario cuando la suscripción se activa
	*/
	protected function activeSubscription($dataEvent){
		$user = User_Payment_Method::where('platform_token', $dataEvent['customer_id'])->first()->user()->first();

	 	/*if($user){
	 		$user->notify(new SubscriberPlanNotification);

	 		//Mandamos la fecha formateada para actualizar en nuestra bd
	 		$lastPayment = Carbon::createFromTimestamp($dataEvent['billing_cycle_start'])->toDateTimeString();

	 		CltvoConektaSubscriptions::updateLastPayment($lastPayment);
	 	}*/
	}

	/*
		Mandamos
	*/
	protected function canceledSubscription($data){
		Log::info('suscripción cancelada');
		Log::info($data);
	}

	/*
		Función que se ejecuta cuando se vence una suscripción
	*/
	public function pastDueSubscription($customer){
		Log::info('tarjeta reclinada');
		Log::info($customer);
	}
}
