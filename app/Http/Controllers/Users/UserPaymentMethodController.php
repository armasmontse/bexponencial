<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ConektaTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;


class UserPaymentMethodController extends Controller
{
    use ConektaTrait;

    /*
		Función que obtiene un cliente y todos sus métodos de pago
    */
    public function getCards(){
        $conektaInfo = [];

    	//Obtenemos el cliente si existe
    	$customer = static::getCustomerIfExists();

        $infoUser = $this->user->info()->with('school')->first();

        //Si el usuario tiene una escuela asignada, solo ponemos el plan asignado
        if(isset($infoUser->school)){
            $plans = static::getPlanById($infoUser->school->plan_id);
        }else{
            $plans = static::getListPlans();
        }

        $generalInfo = [
            'customer' => false,
            'school' => $infoUser->school,
            'plans' => $plans,
            'planSelected' => $plans->first()
        ];

    	if (isset($customer->customer)){
    		//Si existe el customer, lo regresamos junto con los métodos de pago registrados en conekta
    		$conektaInfo = [
				'customer' => $customer,
				'cards' => $customer->customer->payment_sources->params,
			];
    	}

        return array_merge($generalInfo, $conektaInfo);
    }

    /*
		Función que genera un customer y lo guarda en la base de datos además de generar el método de pago en conekta
    */
    public function savePaymentMethod(Request $request){
    	//Obtenemos o creamos el customer
    	$conektaCustomer = static::getOrCreateConektaCustomer();

    	//Si customer es false no hay usuario logueado,
        //Por lo tanto no creamos el  método de pago y regresamos el error a la vista
    	if(!$conektaCustomer || isset($conektaCustomer->error)){
    		return response()->json(['errors' => 'Hubo un problema al crear la cuenta'], 401);
    	}

    	//Teniendo el customer, podemos crear el método de pago
    	$paymentSource = static::createConektaPaymentSource($conektaCustomer->customer, $request->conektaTokenId);

        //Si hay error en el método de pago
        if(!$paymentSource || isset($paymentSource->error)){
            //Borramos el customer sólo si se está creando
            if($conektaCustomer->created){
                static::deleteCustomer($conektaCustomer->customer);
            }

            //retornamos el error al catch de axios
            return response()->json(['errors' =>  'Hubo un problema al asignar el método de pago'], 401);
        }

        //Creamos o actualizamos la suscripción del usuario al plan
        $subscription = static::createOrUpdateConektaSubscription($conektaCustomer->customer);

        //Si customer es false, no creamos el  método de pago y regresamos el error a la vista
        if(!$subscription || isset($subscription->error) || isset($subscription->declined)){
            //Borramos el customer
            if($conektaCustomer->created){
                static::deleteCustomer($conektaCustomer->customer);
            }

            if(isset($subscription->declined)){
                return response()->json(['errors' => 'La tarjeta fue decinada, por favor, inténtalo con otra'], 401);
            }

            //Regresamos al catch de axios
    		return response()->json(['errors' => 'Hubo un problema al crear la suscripción'], 401);
    	}

        //Si llega hasta este punto, guardamos todo en nuestra base
        if(static::saveUserPlan($conektaCustomer->customer, $subscription->subscription, $conektaCustomer->created)){

            //Regresamos el customer y sus métodos de pago y el plan al que pertenece
            return [
                'customer' => $conektaCustomer,
                'cards' => $conektaCustomer->customer->payment_sources->params
            ];
        }

        return response()->json(['errors' => 'Error general']);
    }

    /*
		Función que asigna una nueva tarjeta como default
    */
    public function changeDefaultCard(Request $request){
    	//Obtenemos o creamos el customer
    	$customer = static::getOrCreateConektaCustomer();

    	if(static::setDefaultMethod($customer->customer, $request->card)){
    		//Si se actualiza, volvemos a pedir el customer actualizado y
    		//regresamos las tarjetas nuevamente
    		$customer = static::getOrCreateConektaCustomer();

    		return [
				'cards' => $customer->customer->payment_sources->params,
			];
    	}

		return response()->json(['errors' =>  'Hubo un problema al actualizar el método de pago'], 401);
    }

    /*
        Función para crear una orden de compra
        (No se necesita para la suscripción)
    */

    /*public function createOrder(Request $request){
    	//Obtenemos al customer si está registrado
    	$customer = static::getConektaCustomer();

    	//Si customer es false, regresamos error
    	if(!$customer || isset($customer->error)){
    		return response()->json(['errors' =>  'Hubo un problema al crear la cuenta'], 401);
    	}

    	//Buscamos el plan y lo mandamos como item
    	$plan = static::getPlanById($customer->customer->subscription->plan_id);

    	$items = [
    		'name' => $plan->name,
    		'unit_price' => $plan->amount,
    		'quantity' => 1
    	];

    	$payment_source = $customer->customer->payment_sources->params['data'][0];

    	$order = static::createConektaOrder($customer->customer, $items, $plan->currency);

    	$charge = static::getConektaCargeOrder($order->order, $payment_source);
    	dd($charge);
    }*/
}
