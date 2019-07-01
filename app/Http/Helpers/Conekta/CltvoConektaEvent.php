<?php

namespace App\Http\Helpers\Conekta;

use App\Http\Helpers\Conekta\Traits\CltvoConektaSetTrait;

use Conekta\Event as ConektaEvent;
use Exception;

class CltvoConektaEvent
{

    protected static $paid_types = [
//        "charge.paid",
        "order.paid",
        "subscription.paid"
    ];

    use CltvoConektaSetTrait;

	public static function getEvent($conekta_event_id)
	{
		static::setConekta();

		$response = [
			"error" 	=>null,
			"event"  => null,
		];

		try{
			$response["event"] = collect(ConektaEvent::where(["id"  =>  $conekta_event_id ]))->first();
		}catch (Exception $e){
			$response["error"] = $e;
			return (object) $response;
		}

		if (!$response["event"]) {
			$response["error"]	= new Exception(trans('cltvo.conekta.event.not_exist'));
		}

		return (object) $response;
	}


	public static function getOrderPurchaseMethodName(ConektaEvent $event)
    {
        return camel_case( str_replace(".","_", "create_".$event->type."_order_purchase"));
    }

}
