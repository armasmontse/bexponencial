<?php

namespace App\Http\Helpers\Conekta;

use App\Http\Helpers\Conekta\Traits\CltvoConektaSetTrait;

use Conekta\Customer as ConektaCustomer;

use Exception;

class CltvoConektaPaymentSources
{
    use CltvoConektaSetTrait;

    public static function createPaymentSource(ConektaCustomer $customer, $token_id, $type = "card")
    {
        static::setConekta();

        $response = [
            "error" =>null,
            "payment_source"  => null,
        ];

        try {
            $response["payment_source"] = $customer->createPaymentSource([
			  'token_id' => $token_id,
			  'type'     => $type,
			]);
        } catch (Exception $e) {
            $response["error"] = $e;
        }

        return (object) $response;
    }

	public static function getCollectPaymentSources(ConektaCustomer $customer = null)
    {
		if (!$customer) {
			return collect([]);
		}

        return collect($customer->payment_sources);
    }

	public static function getOrCreatePaymentSource(ConektaCustomer $customer, $token_id)
    {

        $response = (object)[
            "error" => null,
            "payment_source" => null,
        ];

		$response->payment_source = static::getCollectPaymentSources($customer)->where("id",$token_id)->first();

        //Si no existe lo creamos
		if (!$response->payment_source) {
			$response = static::createPaymentSource($customer, $token_id);
		}

		return (object) $response;
    }

}
