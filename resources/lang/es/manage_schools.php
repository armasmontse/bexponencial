<?php
return [
	'admin_menu'	=>	[
		'label'	=>	'Escuelas',
		'create'	=>	'Crear escuela',
		'index'	=>	'Lista de escuelas',
		'trash'	=>	'Eliminar escuela',
	],
	'create' => [
		'label' => 'Escuelas',
		'instructions' => 'Fill in the blanks to create an user',
		'form' => [
				'name'	=> [
						'label'	=>	'Nombre',
						'placeholder' =>	'Nombre de la escuela',
				],

				'code'	=> [
						'label'	=>	'Código',
						'placeholder' =>	'Código de la escuela',
				],
                'phone'	=> [
						'label'	=>	'Teléfono',
						'placeholder' =>	'Teléfono',
				],
                'street_name'	=> [
						'label'	=>	'Calle',
						'placeholder' =>	'Nombre de la calle',
				],
                'street_no'	=> [
						'label'	=>	'Número Exterior',
						'placeholder' =>	'Número Exterior',
				],
				'save' =>	'Guardar',
			],
		'success'	=>	'User successfuly created',
		'error'	=>	'User could not be created',
		],
		'index'	=> [
			'label' => 'Active Users List',
			'table'	=> [
				'name'	=>	'Name',
				'roles'	=>	'Roles',
				'email'	=>	'email',
				'edit'	=>	'Edit',
				'delete'	=>	'Delete',
				'empty'	=>	'No active users'
			],
	],
	'trash'	=>	[
		'label' => 'Trashed Users List',
		'table'	=> [
			'name'	=>	'Name',
			'roles'	=>	'Roles',
			'email'	=>	'email',
			'recovery'	=>	'Recover',
			'empty'	=>	'No trashed users'
		],
	],
	'edit'	=>	[
			'label'	=>	'Edit user',
			'instructions'	=>	'Fill the form to update the user',
			'roles'	=>	[
				'label'	=>	'Select a role',
			],
			'success'	=>	'User successfuly edited',
			'error'	=>	'User could not be edited',
	],
	'delete'	=>	[
		'success'	=>	'User successfuly trashed',
		'error'	=>	'User could not be trashed',
	],
	'recovery'	=>	[
		'success'	=>	'User successfuly recovered',
		'error'	=>	'User could not be recovered',
	],
	'associate'	=>	[
			'roles'	=>	[
					'success'	=>	'Role associated to the user successfuly',
			],
	],
];
