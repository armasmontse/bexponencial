<?php

namespace App\Http\Controllers\Auth;
use App\Models\Users\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Helpers\Traits\Auth\RedirectPathTrait;
use App\Notifications\Users\ActivationAccountNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers,RedirectPathTrait {
        RedirectPathTrait::redirectPath insteadof RegistersUsers;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'names' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            "password" => "required|min:8"
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data["user_name"] = User::createUniqueUsername( $data['names'] );
        $data["active"] = true;
        $fullName = $data['names'];

        $user = User::CreateUser($data);
        $user->notify(new ActivationAccountNotification);
        $address = $user->saveUserAddress($user,$fullName);
        $user->assignRoleStudent();
        $user->saveSkills($user);
        $stats= $user->saveBeStats($user->id);
        $info = $user->saveUserInfo($user,$fullName,$address->id);
        $user->info()->save($info);
        $user->stats()->save($stats);


        return $user;
    }
}
