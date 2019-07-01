<?php

namespace App\Http\Controllers\Traits;

use App\Http\Helpers\Conekta\CltvoConektaCustomer;
use App\Http\Helpers\Conekta\CltvoConektaEvent;
use App\Http\Helpers\Conekta\CltvoConektaOrder;
use App\Http\Helpers\Conekta\CltvoConektaPaymentSources;
use App\Http\Helpers\Conekta\CltvoConektaPlan;
use App\Http\Helpers\Conekta\CltvoConektaSubscriptions;
use App\Http\Helpers\Orders\CustomersHelper;
use App\Http\Helpers\Orders\DiscountsHelper;
use App\Http\Helpers\Orders\OrderHelper;
use App\Http\Helpers\Shipments\ShipmentHelper;

use App\Models\Users\User;

use App\Notifications\Client\Orders\Payments\PaymentNotification;

use Carbon\Carbon;

use Conekta\Customer as ConektaCustomer;
use Conekta\Event as ConektaEvent;
use Conekta\Order as ConektaOrder;
use Conekta\PaymentSource as ConektaPaymentSource;
use Conekta\Plan as ConektaPlan;
use Conekta\Subscription as ConektaSubscription;

use Exception;
use Illuminate\Support\Facades\DB;

use App\Notifications\Users\SubscriberPlanNotification;

trait ConektaTrait {
	/*
		Función que solo obtiene el customer de conekta en caso de existir
	*/
	protected function getCustomerIfExists(){
		//Asignamos el token por default que debe tener el usuario
		return CltvoConektaCustomer::getCustomer(static::getPaymentMethod('platform_token'));
	}

	/*
		Función que crea u obtiene de conekta el customer
	*/
	protected function getOrCreateConektaCustomer(array $options = [])
	{
		//Sólo permitimos obtener o crear si existe el usuario
		if ($this->user) {
			return CltvoConektaCustomer::getOrCreateConektaCustomer($this->user, static::getPaymentMethod('platform_token'));
		}

		//retornamos falso porque no hay usuario
		return false;
	}


	protected function getPaymentMethod($key = null){
		return $this->user->payment_methods()
			->pluck($key)
			->first();
	}

	protected function deleteCustomer(ConektaCustomer $customer){
		return CltvoConektaCustomer::deleteConektaCustomer($customer);
	}

	/*
		Función que crea el método de pago a partir de un customer
	*/
	protected function createConektaPaymentSource(ConektaCustomer $customer, $token){

		//Sólo permitimos obtener o crear si existe el usuario
		if ($this->user) {

			//Mandamos a llamar al helper de Métodos de pago
			$response = CltvoConektaPaymentSources::getOrCreatePaymentSource($customer, $token);

			//Si no hay error, asignamos el cliente a la respuesta y actualizamos el default
			if(!$response->error){
				$response->customer = $customer;

				//Asignamos como método de pago default el que se acaba de guardar
				//Si falla la actualización, en este punto no importa
				//ya que se podrá cambiar el método de pago defaut manualmente
				static::setDefaultMethod($customer, $response->payment_source->id);
			}

			return $response;
		}

		return false;

	}

	/*
		Función que asigna un método de pago a un customer
		a partir del customer id y el payment_source de conekta
	*/
	protected function setDefaultMethod(ConektaCustomer $customer, $paymentSourceId){
		//Actualizamos el ciente mandando como método default el que queremos
		$updateCustomerResponse = CltvoConektaCustomer::updateCustomer($customer, [
			'default_payment_source_id' => $paymentSourceId,
		]);

		if ($updateCustomerResponse->error) {
			//dump($updateCustomerResponse->error);
			//$response->error = $updateCustomerResponse->error;
			return false;
		}

		return true;
	}

	/*
		Función que crea una suscripción de un usuario a un plan
	*/
	protected function createOrUpdateConektaSubscription(ConektaCustomer $customer){
		//Sólo permitimos crear si existe el usuario
		if ($this->user) {
			//Para crear la suscripción en conekta, necesitamos el customer y el plan
			//Pero mandamos los datos para que cree la relacion en nuestra bd
			return CltvoConektaSubscriptions::createOrUpdateConektaSubscription($customer);
		}

		return false;
	}

	/*
		Función que crea un plan a partir de opciones
	*/
	protected function createPlan(array $options){
		//Si options está vacío, regresamos false

		if(!empty($options)){
        	return CltvoConektaPlan::createPlan($options);
		}

		return false;
	}

	protected function saveUserPlan(ConektaCustomer $customer, ConektaSubscription $subscription, bool $isNewCustomer){
		$success = true;

		//Iniciamos una transacción
		DB::beginTransaction();

        try {

            CltvoConektaCustomer::relateUserCustomer($this->user, $customer);
            CltvoConektaSubscriptions::createOrUpdateLocalSubscription($subscription, static::getPaymentMethod('id'), 1);

            DB::commit();
        } catch (\Exception $e) {
            //Damos rollback
            DB::rollback();

            $success = $e->getMessage();
        }

        if($success && $isNewCustomer){
        	//Mandamos el correo de nueva suscripción
        	$this->user->notify(new SubscriberPlanNotification);
        }

        return $success;
	}

	/*
		Obtenemos el plan local
	*/
	protected function getPlanById($planId){
		return CltvoConektaPlan::getLocalPlan($planId);
	}

	/*
		Función que obtiene todos los planes de la base de datos
	*/
	protected function getListPlans(){
		return CltvoConektaPlan::getAllPlans();
	}

	public function createConektaOrder(ConektaCustomer $customer, array $items, $currency)
	{
		return CltvoConektaOrder::createOrder($customer, $items, $currency);
	}

	public function getConektaCargeOrder(ConektaOrder $order, array $payment_method)
	{
		return CltvoConektaOrder::createOrderTotalCharge( $order, $payment_method );
	}

	protected function updateOrderPaymentsFromConektaOrder(Order $order, ConektaOrder $conekta_order)
	{
		$payments_args = CltvoConektaOrder::getChargesToPayment($conekta_order);

		OrderHelper::updateOrderPayments($order , $payments_args);

		$is_paid = collect($payments_args)
		->filter(function($payment_args){
			return in_array($payment_args["payment_status"],["paid"] );
		})
		->sum("amount") == $order->total_amount;

		if ($is_paid) {
			$order->paid_at = Carbon::now();

			if (!$order->save()) {
				throw new Exception(trans("cltvo.conekta.payment.order.paid_not_save" ,["order" => $order->id,  ]), 1);

			}
		}

		return $order;
	}


	/**
	 * Verify with Stripe that the event is genuine.
	 *
	 * @param string $id
	 *
	 * @return bool
	 */
	protected function getConektaEvent($event_id)
	{
		return CltvoConektaEvent::getEvent($event_id);
	}

	protected function isACreatePurchaseEvent(ConektaEvent $event){
	    return method_exists(static::class, CltvoConektaEvent::getOrderPurchaseMethodName($event));
    }

	protected function createPurchaseFromEvent(ConektaEvent $event)
	{
		return $this->{CltvoConektaEvent::getOrderPurchaseMethodName($event)}($event->data["object"] );
	}



}
