<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\User;
use App\Notifications\Users\ActivationAccountNotification;
use App\Http\Helpers\Traits\Auth\RedirectPathTrait;
use Auth;
use Socialite;

class SocialMediaAuthController extends Controller
{
    use  RedirectPathTrait;
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /*
     Obtain the user information from provider.  Check if the user already exists in our
     _ database by looking up their provider_id in the database.
     _ If the user exists, log them in. Otherwise, create a new user then log them in. After that
     _ redirect them to the authenticated users homepage.
     _
     _ @return Response
     */
    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect()->intended( $this->redirectPath() );
    }

    /*
     _ If a user has registered before using social auth, return the user
     _ else, create a new user object.
     _ @param  $user Socialite user object
     _ @param $provider Social auth provider
     _ @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::FindUser($user->email);
        if ($authUser) {
            return $authUser;
        }
        $data["email"] =  $user->email;
        $data["password"] =  "";
        $data["user_name"] = User::createUniqueUsernameSocial( $user->name );
        $data["active"] = true;
        $newUser =User::CreateUser($data);
        $newUser->notify(new ActivationAccountNotification);
        $address = $newUser->saveUserAddress($newUser,$user->name);
        $newUser->assignRoleStudent();
        $user->saveSkills($user);
        $stats= $newUser->saveBeStats($newUser->id);
        $info = $newUser->saveUserInfo($newUser,$user->name,$address->id);
        $newUser->info()->save($info);
        $newUser->stats()->save($stats);
        return $newUser;
    }
}
