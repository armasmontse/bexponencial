<?php namespace App\Http\Helpers\Traits\Auth;

use Auth;
use Illuminate\Support\Facades\Log;

trait RedirectPathTrait {


    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        $user = Auth::user();

        return session('BexpoPreviousURL') ? session('BexpoPreviousURL') : ($user ? (  $user->hasPermission("admin_access") ? $user->getAdminHomeUrl()  : ($user->hasPermission("student_access") ? $user->getStudentHomeUrl() : ($user->hasPermission("parent_access") ? $user->getParentHomeUrl() : $user->getSchoolHomeUrl())) ) : route("client::login"));
    }

}
