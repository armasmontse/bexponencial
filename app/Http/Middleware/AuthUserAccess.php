<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Response;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthUserAccess
{
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $current_user = $this->auth->user();
        $user_id    = $current_user->id;
        $user_name  = $current_user->name;

        $parameters = $request->route()->parameters();

        if (
            ( isset($parameters["user_id"]) && $user_id != $parameters["user_id"] )  ||
            ( isset($parameters["user_name"]) && $user_name != $parameters["user_name"]  ) ||
            ( isset($parameters["user"]) && $user_id != $parameters["user"]->id  )

            ) {
            if ($request->ajax() || $request->wantsJson()){
                return response('Unauthorized.', 401);
            } else {
                return abort(404);
            }
        }
        return $next($request);
    }
}
