<?php

namespace App\Http\Helpers\Conekta;

use App\Http\Helpers\Conekta\Traits\CltvoConektaSetTrait;
use App\Models\Users\Plans\Plan;
use Conekta\Plan as ConektaPlan;
use Exception;

class CltvoConektaPlan
{
    use CltvoConektaSetTrait;

    /*
		Función que en primera instancia crea un plan en la plataforma de conekta
		Y después lo registra en nuestra BD
    */
    public static function createPlan(array $options = [])
	{
		$response = static::createConektaPlan($options);

		//Si existe el plan, guardamos en nuestra base de datos
		if ($response->plan) {
			$response = static::createLocalPlan(static::getDataPlan($response->plan, $options));
		}

		return $response;
	}

    /*
		Función que crea un plan en la plataforma de conekta
    */
    public static function createConektaPlan(array $options = [])
    {
        static::setConekta();

        $response = [
            'error' =>null,
            'plan'  => null,
        ];

        try {
            $response['plan'] = ConektaPlan::create($options);
        } catch (Exception $e) {
            $response['error'] = $e;
        }

        return (object) $response;
    }

    /*
		Función que a partir del plan que se acaba de crear en conekta,
		relaciona el token y crea el registro en nuestra base de datos
    */
    public static function createLocalPlan(Plan $plan)
	{
		static::setConekta();

		$response = [
			'error' => null,
			'plan' => null,
		];

		if (!$plan->save()) {
            $response['error'] = new Exception(trans('cltvo.conekta.plan.user.associate.error'));
        }else{
			$response['plan'] = $plan;
		}

		return (object) $response;
	}

	/*
		Función que crea la instancia del plan a partir de un
		pbjeto de la plataforma de conekta y la devuelve
	*/
	public static function getDataPlan(ConektaPlan $conektaPlan, array $options = null){

		$plan = new Plan;
		$plan->plan_name = $conektaPlan->name;
		$plan->plan_token = $conektaPlan->id;
		$plan->default = $options['default'];
		$plan->price = $conektaPlan->amount / 100;

		return $plan;
	}

	public static function getPlan($conektaPlanId){
		return ConektaPlan::find($conektaPlanId);
	}

	public static function getLocalPlan($planId){
		return Plan::select('id', 'plan_name', 'price', 'default')
			->where('id', $planId)
			->get();
	}

	public static function getAllPlans(){
		return Plan::select('id', 'plan_name', 'price', 'default')
			->orderBy('default', true)
			->get();
	}

}
