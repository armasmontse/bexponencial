<?php

namespace App\Http\Helpers\Conekta;

use App\Http\Helpers\Conekta\Traits\CltvoConektaSetTrait;
use App\Models\Users\Plans\User_Payment_Method;
use App\Models\Users\User;
use Conekta\Customer as ConektaCustomer;
use Exception;

class CltvoConektaCustomer
{
    use CltvoConektaSetTrait;

    public static function createCustomer(array $options = [])
    {
        static::setConekta();

        $response = [
            "error" =>null,
            "customer"  => null,
            "created" => true,
        ];

        try {
            $response["customer"] = ConektaCustomer::create($options);
        } catch (Exception $e) {
            $response["error"] = $e;
        }

        return (object) $response;
    }

	public static function getCustomer($conekta_customer_id)
	{
		static::setConekta();

		$response = [
			"error" => null,
			"customer"  => null,
            "created" => false,
		];

		try{
			$response["customer"] = ConektaCustomer::find( $conekta_customer_id );
		}catch (Exception $e){
			$response["error"] = $e;
		}

		return (object) $response;
	}

	public static function updateCustomer(ConektaCustomer $customer,$user_options)
	{
		static::setConekta();

		$response = [
			"error" 	=>null,
			"customer"  => null,
		];

		try{
			$response["customer"] = $customer->update($user_options);
		}catch (Exception $e){
			$response["error"] = $e;
		}

		return (object) $response;
	}

	public static function getUserOptions(User $user,array $options = [])
	{
		return array_merge( [
				'name' 	=> $user->full_name,
				'email' => $user->email
			],$options);
	}


	public static function relateUserCustomer(User $user, ConektaCustomer $customer)
	{
		static::setConekta();

		$response = [
			"error" 	=> null,
			"customer"  => null,
		];

		$paymentMethod = static::getDataPaymentMethod($user->id, $customer->id);
		//$user->payment_methods()->save($customer);

		if (!$user->payment_methods()->save($paymentMethod)) {
            $response["error"] = new Exception(trans('cltvo.conekta.customer.user.associate.error'));
        }else{
			$response["customer"] = $customer;
		}

		return (object) $response;
	}

	/*
		Función que sólo crea el customer en conekta
	*/

	public static function createUserCustomer(User $user,array $options = [])
	{
		$response = static::createCustomer( static::getUserOptions($user,$options) );

		/*if ($response->customer) {
			$response = static::relateUserCustomer($user, $response->customer);
		}*/
		return $response;
	}

	public static function updateOrCreateUserCustomer(User $user, array $options = [])
	{
		$customer_response = static::getUserCustomer($user);

		if (!$customer_response->customer) {
			$response = static::createUserCustomer($user,$options);
		}else{
			$response = static::updateCustomer($customer_response->customer,static::getUserOptions($user,$options));
		}

		return $response;
	}

	/*
		Función que obtiene o crea un cliente en conekta
	*/

	public static function getOrCreateConektaCustomer(User $user, $customerToken = null){
		//Si existe $customerToken lo buscamos y regresamos el customer
		if(isset($customerToken)){
			return static::getCustomer($customerToken);
		}

		//Si no, lo creamos y lo regresamos
		return static::createUserCustomer($user);
	}

	/*
		Función que crea la instancia del método de pago a partir de un
		pbjeto de la plataforma de conekta y la devuelve
	*/
	public static function getDataPaymentMethod($userId, $customerToken){

		$paymentMethod = new User_Payment_Method;
		$paymentMethod->user_id = $userId;
		$paymentMethod->platform_token = $customerToken;
		$paymentMethod->recurrence = false;
		$paymentMethod->payment_type_id = 1;

		return $paymentMethod;
	}

	/*
		Función que elimina a un customer de conekta
	*/
	public static function deleteConektaCustomer(ConektaCustomer $customer){

		static::setConekta();

		$response = [
			"error" 	=>null,
			"customer"  => null,
		];

		try{
			$response["customer"] = $customer->delete();
		}catch (Exception $e){
			$response["error"] = $e;
		}

		return (object) $response;
	}

}
