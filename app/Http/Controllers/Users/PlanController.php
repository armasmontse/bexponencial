<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Traits\ConektaTrait;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    use ConektaTrait;

    /*
		Función momentanea para crear un plan de prueba
    */
    public function makeFakePlan(){
    	//Opciones de ejemplo
		$options1 = [
		    'name' => 'Plan Oro',
		    'amount' => 80000,
		    'currency' => 'MXN',
		    'interval' => 'week',
		    'frequency' => 1,
		    'trial_period_days' => 0,
		    'expiry_count' => 8,
		    'default' => false
        ];

        //Si se requiere, la función regresa una instancia del modelo Plan
        dump(static::createPlan($options1));

        //Opciones de ejemplo
		$options2 = [
		    'name' => 'Plan Plata',
		    'amount' => 60000,
		    'currency' => 'MXN',
		    'interval' => 'week',
		    'frequency' => 1,
		    'trial_period_days' => 0,
		    'expiry_count' => 8,
		    'default' => false
        ];

        //Si se requiere, la función regresa una instancia del modelo Plan
        dump(static::createPlan($options2));

        //Opciones de ejemplo
		$options = [
		    'name' => 'Plan Bronce',
		    'amount' => 30000,
		    'currency' => 'MXN',
		    'interval' => 'week',
		    'frequency' => 1,
		    'trial_period_days' => 0,
		    'expiry_count' => 8,
		    'default' => false
        ];

        //Si se requiere, la función regresa una instancia del modelo Plan
        dump(static::createPlan($options));
    }
}
