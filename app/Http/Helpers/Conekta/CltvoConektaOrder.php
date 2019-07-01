<?php

namespace App\Http\Helpers\Conekta;

use App\Http\Helpers\Conekta\Traits\CltvoConektaSetTrait;
use App\Http\Helpers\Shipments\ShipmentHelper;

use Conekta\Customer as ConektaCustomer;
use Conekta\Order as ConektaOrder;
use Conekta\Charge as ConektaCharge;
use Conekta\PaymentSource as ConektaPaymentSource;

use App\Models\Orders\Carts\Cart;
use App\Models\Orders\Payments\Method;
use App\Models\Users\User;

use Exception;

class CltvoConektaOrder
{
    use CltvoConektaSetTrait;

	public static function createOrder(ConektaCustomer $customer, array $line_items, $currency, array $discount_lines = [])
    {
        static::setConekta();

        $response = [
            "error" =>null,
            "order"  => null,
        ];

        try {
            $response["order"] = ConektaOrder::create([
				'currency' => $currency,
				'customer_info' =>
					['customer_id' => $customer->id],
				'line_items' => [$line_items],
				'discount_lines' => $discount_lines,
				//'shipping_lines' => $shipping_lines,
				//'shipping_contact' => $shipping_contact,
			]);
        } catch (Exception $e) {
            $response["error"] = $e;
        }

        return (object) $response;
    }

    public static function createOrderTotalCharge(ConektaOrder $order, array $payment_method )
    {
        static::setConekta();

        $response = [
            "error" 	=> null,
            "charge"  	=> null,
        ];

        try {
            $response["charge"] = $order->createCharge([
				'payment_method' => $payment_method,
				'amount' => $order->amount,
				'token_id' => $payment_method['id']
			]);
        } catch (Exception $e) {
            $response["error"] = $e;
        }

        return (object) $response;
    }


	/*public static function getOrderLineItems(array $items )
	{
		return collect($items)
			->map(function($item){
				return $item->getConektaItemMap();
			})->all();
	}*/

	/*public static function getOrderCartDiscountsLines(array $discounts,Cart $cart )
	{
		$cart_maped = $cart->cartMap();
		return collect($discounts)
			->filter(function($discount){
				return $discount;
			})->map(function($discount) use ($cart_maped){
				return $discount->getConektaCartDiscountMap($cart_maped);
			})->all();
	}*/

    /*public static function createCartOrder(ConektaCustomer $customer, Cart $cart, array $input, $payable_response,User $user = null )
    {
		$line_items =  $cart->items->map(function($item){
			return $item->getConektaItemMap();
		})->all();

		$line_disocunts = static::getOrderCartDiscountsLines([$payable_response->discount],$cart,$payable_response->min_to_free_shipping);

		$shipping_lines = [
			[
				"amount"	=> $payable_response->shipment->value,
    			"carrier"	=> $payable_response->shipment->carrier,
			]
		];

		$shipping_contact = static::getOrderShippingContact( $input, $user);

        return static::createOrder($customer,$line_items, $line_disocunts,$shipping_lines,$shipping_contact,$payable_response->currency);
    }*/

	/*public static function getOrderShippingContact(array $input, User $user = null )
	{
		$shipping = ShipmentHelper::getShippingArgsByInput($input, $user);

		return [
			"receiver"			=> $shipping["full_name"],
    		"phone"				=> $shipping["phone"],
    		"between_streets"	=> $shipping["references"],
	    	"address"			=> [
				"street1"		=> $shipping["street_1"],
				"city"			=> $shipping["city"],
				"state"			=> $shipping["state"],
				"postal_code"	=> $shipping["zip_code"],
				"country"		=> $shipping["country"]->iso3166,
			]
	    ];
	}*/

    /*public static function getChargesToPayment(ConektaOrder $order)
    {
        return collect($order->charges)->map(function($charge){
			return static::mapChargeTopayment($charge);
		})->all();
    }

	public static function mapChargeTopayment(ConektaCharge $charge)
	{
		$payment_info = [];

		if ($charge->payment_method->type == "spei") {
			$payment_info = [
				'bank' => $charge->payment_method->bank,
				'CLABE' => $charge->payment_method->clabe,
			];
		}

		$method = Method::byConekta()->byMethod( $charge->payment_method->type)->first();

        if (!$method) {
			$method = Method::create([
				'provider'	=> "conekta",
				'method'	=> $charge->payment_method->type,
			]);
        }

        if (!$method) {
            throw new Exception(trans("cltvo.conekta.payment.type.not_exist" ,["type" => $charge->payment_method->type ]), 1);
        }

		return [
			"amount"			=> $charge->amount,
			"info"				=> "",
			"payment_status"	=> $charge->status,
			"payment_id"		=> $charge->order_id, // no modificar  se utliza el id de la orden no del cargo
			"method_id"	        => $method->id,
			"payment_info"		=> $payment_info,
		];
	}*/

}
