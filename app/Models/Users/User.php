<?php

namespace App\Models\Users;

use App\Models\Traits\Users\PermissionRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Levels\Mission;
use App\Models\Levels\Challenges\Challenge;
use Illuminate\Support\Facades\Log;
use App\Models\Traits\Users\CltvoNotifiable;
use Storage;

class User extends Authenticatable
{
    use PermissionRoleTrait;
    use CltvoNotifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'id' => 'integer',
        'active' => 'boolean'
    ];

    protected $appends = [
        'roles_ids',
        'full_name',
    ];

    /* Eloquent Relationsips */
    public function info()
    {
        return $this->hasOne(User_Info::class, 'user_id');
    }

    public function stats()
    {
        return $this->hasOne(Be_Stat::class, 'user_id');
    }
    public function missionsCount(){
        $completed=Mission::getMissionsCompleted($this->id)->count();
        $total=Mission::All()->count();
        return "$completed/$total";
    }
    public function answers()
    {
        return $this->hasMany(
            'App\Models\Levels\Challenges\Answer',
            'user_id'
        );
    }

    public function badges(){
      return $this->belongsToMany(Badge::class);
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\Users\Skill')->withPivot('value');
    }
    public function purchases(){
        return $this->hasMany(
            'App\Models\Logs\Purchase_Log',
            'user_id'
        );
    }

    /*
        Relación de usuario con métodos de pago
    */
    public function payment_methods()
    {
        return $this->hasMany(
            'App\Models\Users\Plans\User_Payment_Method',
            'user_id'
        );
    }

     /* Eloquent Relationsips */


    public static function FindUser($user)
    {
        return static::where('email', $user)->first();
    }

    public static function CreateUser(array $input)
    {
        return static::create([
            'user_name'     => trim($input['user_name']),
            'email'         => trim($input['email']),
            'password'      => bcrypt($input['password']),
            'active'        => $input['active']
        ]);
    }
    public function getActivationAccountUrl()
    {
        return route("client::register:get", cltvoMailEncode($this->email));
    }
    public static function createUniqueUsername($firstName)
    {
        $username = str_slug(trim($firstName)." ".rand(0, 99));

        $userNameNotUnique = true;

        while ($userNameNotUnique) {
            $users = User::where('user_name', $username) -> count();
            ;
            if ($users == 0) {
                $userNameNotUnique = false;
            } else {
                $username.= rand(0, 9);
            }
        }

        return $username;
    }

    public static function createUniqueUsername1($firstName)
    {
        $username = str_slug(trim($firstName)." ".rand(0, 99));

        $userNameNotUnique = true;

        while ($userNameNotUnique) {
            $users = User::where('user_name', $username) -> count();
            ;
            if ($users == 0) {
                $userNameNotUnique = false;
            } else {
                $username.= rand(0, 9);
            }
        }

        return $username;
    }

    public static function setRandomPassword()
    {
        return str_random(4).mt_rand(1, 10).str_random(4).mt_rand(10, 99).str_random(4);
    }
    public static function createUniqueUsernameSocial($firstName)
    {
        $username = str_slug(trim($firstName)." ".rand(0,99));

        $userNameNotUnique = true;

        while ($userNameNotUnique) {
            $users = User::where('user_name',$username) -> count();;
            if ($users == 0) {
                $userNameNotUnique = false;
            }else {
                $username.= rand(0,9);
            }
        }

        return $username;
    }
    public static function Achievements($user)
    {


        return [["Puntos",$user->stats->exp_points],
        ["Monedas",$user->stats->coins],
        ["Insignias",$user->badges()->count()],
        ["Guerrero","S/N"],
        ["Retos Globales",0],
        ["Retos Completados",Challenge::getChallengesCompleted($user->id)->count()],
        ["Misiones Resueltas",Mission::getMissionsCompleted($user->id)->count()],
        ["Compras Realizadas",$user->purchases()->count()]];
    }

    public static function ActivateSchoolUser(array $input)
    {
        return static::create([
            'name'          => trim($input['name']),
            'email'         =>trim($input['email']),
            'first_name'    => trim($input['first_name']),
            'last_name'     => trim($input['last_name']),
            'password'      => bcrypt($input['password']),
            'active'        => $input['active']
        ]);
    }
    public static function getStudents()
    {
        $users=User::whereHas(
          'roles',
            function ($q) {
                $q->where('slug', 'student');
            }
        )->get();

        return $users->pluck('id');
    }

    public static function UserRanking($filter)
    {
        $users = static::getStudents();

        //$ranking = User::whereIn('id', $users)->with("stats")->orderBy('exp_points')->get();
        $ranking = User::join('be__stats', function ($join) use ($users) {
            $join->on('be__stats.user_id', '=', 'users.id')
                ->whereIn('users.id', $users);
        })->groupBy('users.id')
        ->orderBy('be__stats.exp_points','DESC')
        ->get();
        $ranking = $ranking->map(function ($user) {
            return ["photo"=>Storage::url($user->info->photo),"name"=>$user->full_name,"points"=>$user->stats->exp_points,"coins"=>$user->stats->coins,"badges"=>$user->badges()->count()];
        })->reject(function ($user) {
                return empty($user);
        });
        return $ranking;
    }


    public function isActive()
    {
        return  $this->active;
    }


    public function getStudentHomeUrl()
    {
        return route("student::home", $this->user_name);
    }
    public function getSchoolHomeUrl()
    {
        return route("school::home", $this->user_name);
    }
    public function getParentHomeUrl()
    {
        return route("parent::home", $this->user_name);
    }
    public function getAdminHomeUrl()
    {
        return route("admin::index", $this->user_name);
    }

    //Función que obtiene los datos del usuario por su username
    //En caso de fallo, regresa un 404
    public static function findByUsername($username)
    {
        return static::where('user_name', $username)->firstOrFail();
    }

    public function saveUserInfo($user, $name, $address)
    {
        return User_Info::CreateInfo($user->id, $name, $address);
    }

    public function saveUserAddress($user)
    {
        return Address::CreateAddress();
    }

    public function saveBeStats($user)
    {
        return Be_Stat::CreateStats($user);
    }
    public function saveSkills($user)
    {
        return Skill::SyncSkills($user);
    }


    /**
    * Creamos la relación con notifications
    */
    public function notifications()
    {
        return $this->belongsToMany('App\Models\Users\Notifications\Notification');
    }

    public function hasNotification($notification_type)
    {
        return $this->notifications()->CollectNotificationsByType($notification_type)->count() > 0;
    }
    public function getFullNameAttribute()
    {
        if (isset($this->info)) {
            return $this->info->full_name;
        } else {
            return '';
        }
    }

    /**
     * Función ṕara guardar actualizaciones
    */

    public static function updateStats($userId, $expPoints, $coins, $extraPoints, $skills){
        $user = static::find($userId);

        foreach ($skills as $skill => $value) {

            $us = $user->skills()->find($skill);
            $newValue=$us->pivot->value+$value;
            $user->skills()->updateExistingPivot($skill, ["value"=>$newValue]);
        }


        $user->stats()->update([
            'coins' => $user->stats->coins + $coins,
            'exp_points' => $user->stats->exp_points + $expPoints + $extraPoints
        ]);
    }
}
