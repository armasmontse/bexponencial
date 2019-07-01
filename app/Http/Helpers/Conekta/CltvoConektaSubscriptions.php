<?php

namespace App\Http\Helpers\Conekta;

use App\Http\Helpers\Conekta\CltvoConektaCustomer;
use App\Http\Helpers\Conekta\Traits\CltvoConektaSetTrait;
use App\Models\Users\Plans\Plan;
use App\Models\Users\Plans\User_Plan;
use Conekta\Customer as ConektaCustomer;
use Conekta\Subscription as ConektaSubscription;
use Exception;

class CltvoConektaSubscriptions
{
    use CltvoConektaSetTrait;

    /*
		Función que devuelve la respuesta con la suscripción creada o editada
    */
    public static function createOrUpdateConektaSubscription(ConektaCustomer $customer){

    	//Verificamos si el customer tiene una suscripción
    	if(isset($customer->subscription)){
    		//Si es así, actualizamos
    		return static::updateSubscription($customer);
		}
		//Si no, creamos y retornamos el resultado
		return static::createSubscription($customer);
    }

    /*
		Función que crea una suscripción en la plataforma de conekta
    */
    public static function createSubscription(ConektaCustomer $customer)
	{
		$plan = Plan::first(); //ASIGNADO POR EL MOMENTO

		return static::createConektaSubscription($customer, $plan->plan_token);
	}

	/*
		Función que actualiza la suscripción en conekta y en la base de datos local
	*/
	public static function updateSubscription(ConektaCustomer $customer){
		//Buscamos el método de pago por default
		$paymentSource = collect($customer->payment_sources)->where('default', true)->first();

		$plan = Plan::first();

		return static::updateConektaSubscription($customer, $plan->id, $paymentSource->id);
	}

	/*
		Función que actualiza una suscripción en conekta
	*/
    public static function updateConektaSubscription(ConektaCustomer $customer, $planId, $card){

    	static::setConekta();

        $response = [
            'error' => null,
            'customer' => null,
            'subscription' => null
        ];

        try {
        	//La función update devuelve el customer con sus datos
            $response['customer'] = $customer->update([
              'plan' => $planId,
              'card' => $card //Id de la tarjeta a la cual que quiere actualizar
			]);

			$response['subscription'] = $customer->subscription;
        } catch (Exception $e) {
            $response['error'] = $e;
        }

        return (object) $response;

    }

	/*
		Fucnión que crea una suscripción en conekta
	*/
    public static function createConektaSubscription(ConektaCustomer $customer, $planId){

    	static::setConekta();

        $response = [
            'error' => null,
            'declined' => null,
            'subscription' => null,
        ];

        try {
        	//La función create devuelve sólo la instrancia de subscription
            $response['subscription'] = $customer->createSubscription([
              	'plan' => $planId
			]);

            if($response['subscription']['status'] != 'active'){
            	$response['declined'] = true;
            }

        } catch (Exception $e) {
            $response['error'] = $e;
        }

        return (object) $response;

    }

     /*
		Función que a partir de la suscripción que se acaba de crear en conekta,
		relaciona el token y crea el registro en nuestra base de datos
    */
    public static function createOrUpdateLocalSubscription(ConektaSubscription $conektaSubscription, $paymentMethodId, $planId)
	{
		static::setConekta();

		$response = [
			'error' => null,
			'subscription' => null,
		];


		$subscription = static::getDataSubscription($conektaSubscription->id, $paymentMethodId, $planId);

		if (!$subscription->save()) {
            $response['error'] = new Exception(trans('cltvo.conekta.subscription.user.associate.error'));
        }else{
			$response['subscription'] = $conektaSubscription;
		}

		return (object) $response;
	}

	/*
		Función que crea la instancia de la subscripción en nuestra bd a partir del id del token de conekta
		El id del plan en nuestra bd y el id del payment method en nuestra bd
	*/
	public static function getDataSubscription($conektaSubscriptionId, $paymentMethodId, $planId){
		//Buscamos el id en la base de datos
		$subscription = User_Plan::find($conektaSubscriptionId);

		if(!isset($subscription)){
			$subscription = new User_Plan;
			$subscription->subscription_token = $conektaSubscriptionId;
		}

		$subscription->payment_method_id = $paymentMethodId;
		$subscription->plan_id = $planId;
		$subscription->last_payment = now();

		return $subscription;
	}

	public static function cltvoConektaSubscription(ConektaSubscription $subscription = null )
	{
		if (!$subscription) {
			return null;
		}

		$subscription->is_active = in_array($subscription->status, ["in_trial", "active"]);

		return $subscription ;
	}

	public static function relateUserSubscription(User $user,ConektaSubscription $subscription)
	{
		static::setConekta();

		$response = [
			"error" 	=> null,
			"subscription"  => null,
		];

		$user->conekta_subscription_id = $subscription->id;

		if (!$user->save()) {
			$response["error"] = new Exception(trans('cltvo.conekta.subscription.user.associate.error'));
		}else{
			$response["subscription"] = $subscription;
		}

		return (object) $response;
	}

	/*
		Función que actualiza el último pago hecho
	*/
	public static function updateLastPayment($conektaSubscriptionId, $lastPayment){
		//Buscamos el id en nuestra bd
		$subscription = User_Plan::find($conektaSubscriptionId);

		$subscription->last_payment = $lastPayment;

		//Asignamos la nueva fecha
		if (!$subscription->save()) {
			return false;
		}

		return true;
	}

}
