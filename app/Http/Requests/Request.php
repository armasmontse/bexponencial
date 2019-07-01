<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

abstract class Request extends FormRequest
{

    protected $user;

    public function __construct(\Illuminate\Http\Request $request)
    {

        $this->user = Auth::user();

        parent::__construct();
    }

}
