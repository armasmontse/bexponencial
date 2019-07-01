<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Traits\CltvoAdminTrait;

class AdminController extends Controller
{
	use CltvoAdminTrait;

	protected $menu_items = [
		'items' => [
			[
				'icon'  		=> 'perm_identity',
				'label' 		=> 'manage_users',
				'route_name' 	=> 'users.index',
				'permission'	=> 'manage_users',
			],
		]
	];


	protected $trans_files_extensions =[
		"php"
	];

	protected $trans_paths = [
		"app",
		"database",
		"resources/lang",
		"resources/views",
		"routes"
	];

}
