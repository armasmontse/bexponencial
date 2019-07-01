<?php

return [
	'user' =>[
		'update_password'    => [
			'subject'   => 'Tu contraseña ha cambiado',
	        'copy'      => 'Recientemente notamos que tu contraseña ha cambiado, si no reconoces este cambio por favor contacta a soporte técnico',
		],

		'update_mail'    => [
			'subject'   => 'Tu email ha cambiado',
	        'copy'      => 'Recientemente notamos que has hecho un cambio en tu mail, si no fuiste tú por favor contacta a soporte técnico, en caso contrario ignora este mensaje',
		],
		'admin_billing'	=>	[
			'subject'	=>	'Se ha solicitado una factura a stickerboutique.com',
			'copy'	=>	'El usuario :name, con número de orden :key, ha solicitado una factura.',
			'action'	=>	'Ver datos de facturación'
		],
		'billing'	=>	[
			'subject'	=>	'Has solicitado una factura a stickerboutique.com',
			'copy'		=>	'Has solicitado una factura para tu orden :key, en breve nos pondremos en contacto contigo para hacertela llegar.',
			'action'	=>	''
		]
	],

	'admin' => [
		'users'	=> [
			'activation_account' => [
				'subject'   => 'Registro en Sticker Boutique',
				'action'    => 'Activar cuenta',
			],
		],
		'orders'	=>	[
			'impressess'	=>	[
				'send_impress_to_print'	=>	[
					'subject'	=>	'Stickerboutique ha enviado un paquete de impresiones',
					'copy'		=>	'Hemos enviado un nuevo paquete de impresiones, para descargar los PDFs debes dar click en el siguiente botón.',
					'action'	=>	'Descargar impresiones'
				],
				'send_cancel_impress_to_print'	=>	[
					'subject'	=>	'Stickerboutique, cancelación de impresión',
					'copy'		=>	'Hemos cancelado la impresión de uno de los PDFs . Para ver los archivos actualizados a imprimir, da click en el siguiente botón.',
					'action'	=>	'Ver impresiones'
				]
			],
			'update_shipping_status'	=>	[
				'subject'	=>	'Estatus del envío de tu orden :order',
				'sent'		=>	':name, te informamos que hemos :status tu orden <b>:order</b> a la dirección que nos has indicado al realizar tu compra. Tu pedido será entregado por medio de la compañía :carrier, y podrás obtener un seguimiento más preciso de tu orden con el número de rastreo <b>:code</b>.',
				'delivered'	=>	':name, tu orden <b>:order</b> ha sido entregada. <br/> Gracias por tu compra.',
				'preparing'	=>	':name, estamos :status de tu orden <b>:order</b>. En cuanto tu pedido esté listo, recibirás nuevamente un correo para mantenerte informado del estatus del envío de tu compra.',
				'action'	=>	'Detalles de tu compra'
			],
			'update_billing_status'	=>	[
				'subject'	=>	'Estatus de la factura de tu orden :order',
				'request'	=>	':name, hemos recibido correctamente los datos para generar la factura de tu orden <b>:order</b>. En breve te la haremos llegar. Gracias por tu compra.',
				'send'		=>	':name, hemos enviado la factura de tu orden <b>:order</b>. Gracias por tu compra.',
				'error'		=>	':name, hemos tenido problemas para generar la factura por tu orden <b>:order</b>. Para conocer más acerca de estos, por favor revisa los detalles de tu compra en la sección de facturación y ponte en contacto con nosotros nuevamente.',
				'action'	=>	'Detalles de tu compra'
			]
		]
	],

	'general'=> [
		'success'			=> 'Hola',
		'error'				=> 'Whoops',
		'salutation'		=> 'Saludos',
		'button_problems'	=> 'Si tienes problemas dando click al botón ":button", copia y pega el siguiente URL en tu navegador.',
		'rights_reserved'	=> 'Todos los derechos reservados',

	],

	'client'=> [
		'reset_password' => [
			'subject'   => 'Restablecer contraseña',
	        'copy'      => 'Recientemente notamos que has perdido tu contraseña, para restablecer da click en el boton',
	        'action'    => 'Restablecer contraseña',
		],

		'contact' => [
			'subject'   => 'Información de contacto: :email (:name)',
	        'copy'      => ':name con el correo :email dejo el siguiente mensaje <br/> :message',
		],

		'thanks_for_contact' => [
			'subject'   => 'Confirmación de contacto',
			'copy'      => 'Gracias por tu mensaje.Pronto nos comunicaremos contigo.',
		],

		'orders'	=>	[
			'order'	=>	[
				'subject'	=>	'Tu orden de compra de Sticker Boutique',
				'copy'		=>	'¡Gracias por tu compra :name! <br><br> Hemos recibido tu orden de compra :key correctamente. Tu pago está en proceso, te notificaremos cuando hayamos registrado tu pago.',
				'action'	=>	'Detalles de tu compra'
			],
			'admin_order'	=>	[
				'subject'	=>	'Se ha realizado una nueva compra',
				'copy'	=>	'El usuario :name, ha realizado una compra',
				'action'	=>	'Detalles de la compra'
			],
			'payments'	=>	[
				'payment'	=>	[
					'subject'	=>	'Tu pago en Sticker Boutique se ha realizado correctamente',
					'copy'	=>	':name, el pago de tu compra :key se ha realizado correctamente. ',
					'action'	=>	'Detalles de tu compra'
				]
			]
		],

	],

	'fatal'	=>	[
		'subject'	=>	'Fatal notification',
		'copy'		=>	''
	],
];
