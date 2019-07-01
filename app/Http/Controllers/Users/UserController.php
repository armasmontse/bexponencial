<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Models\Levels\Block;
use App\Models\Users\Notifications\Notification;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Requests\Users\UserUpdateWpRequest;
use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Models\Users\User_Info;
use App\Models\Users\Address;
use App\Http\Controllers\Traits\ConektaTrait;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use JavaScript;
use Response;
use Storage;

class UserController extends Controller
{
    public function index($user){
        //Obtenemos a todos los usuarios
        JavaScript::put([
        'user' => $user,
    ]);
        $blocks = Block::where("id",1)->first();
        return view('users.students.index',compact("blocks"));
    }

    public function show($username){

        //parent::LogDebug("Valida que el usuario existe");
        $user = User::where('user_name', $username)->firstOrFail();

        $user->info->photo=Storage::url($user->info->photo);
        return [
        'email' => $user->email,
        'info' => $user->info,

        "address"=>$user->info->address
         ];
    }

    /*Función que actualiza los datos de un usuario*/

    /*PREGUNTAR COMO SE VA A ACTUALIZAR EL USUARIO*/
    public function update(UserUpdateRequest $request, $username){


        //Primero se aplican validaciones
        $data = $request->all();
        $user = User::findByUsername($username);

            $user->email=$data["user"]["email"];
            $user->info->full_name = $data["user"]["info"]["full_name"];
            $user->info->birth_date = $data["user"]["info"]["birth_date"];
            $user->info->address->phone =$data["user"]["address"]["phone"];
            $user->info->address->street =$data["user"]["address"]["street"];
            $user->info->address->street_no =$data["user"]["address"]["street_no"];
            $user->info->address->neighbourhood =$data["user"]["address"]["neighbourhood"];
            $user->info->address->city = $data["user"]["address"]["city"];
            $user->info->address->state =$data["user"]["address"]["state"];
            $user->info->address->zip_code =$data["user"]["address"]["zip_code"];
            if($request->hasFile('photo')){

                $user->info->photo=Storage::putFileAs(User_Info::setPathFile($username), new File($request->photo), basename($request->photo->getClientOriginalName()));
            }


        if(!$user->push()){
            return Response::json([
                'error' => "Error al actualizar la Información del usuario."
            ], 200);
        }
        return Response::json([
            'success' => "Información actualizada con éxito."
        ], 200);



    }

    public function UpdateUserWithPassword(UserUpdateWpRequest $request, $username){

        //Primero se aplican validaciones
        $data = $request->all();
        $user = User::findByUsername($username);


            $user->email=$data["email"];
            $user->info->full_name = $data["info"]["full_name"];
            $user->info->birth_date = $data["info"]["birth_date"];
            $user->info->address->phone =$data["address"]["phone"];
            $user->info->address->street =$data["address"]["street"];
            $user->info->address->street_no =$data["address"]["street_no"];
            $user->info->address->neighbourhood =$data["address"]["neighbourhood"];
            $user->info->address->city = $data["address"]["city"];
            $user->info->address->state =$data["address"]["state"];
            $user->info->address->zip_code =$data["address"]["zip_code"];
            $user->password = bcrypt( $data["password"] ) ;


        if(!$user->push()){
            return Response::json([
                'error' => "Error al actualizar la Información del usuario."
            ], 200);
        }
        return Response::json([
            'success' => "Información actualizada con éxito."
        ], 200);



    }



    public function configSettings($username){
        //Obtenemos al usuario a través del username
        $user = User::where('user_name', $username)->firstOrFail();
        parent::LogDebug($username);
        if($user){
            parent::LogDebug("encuentra usuario");
        }
        $notificationsList = Notification::getAllNotifications();
        JavaScript::put([
        'notifications' => $notificationsList,
         ]);

        return view('users.students.configuration');
    }

    /*Función que va a traer las notificaciones que el usuario quiere que le lleguen
    public function userNotifications($username){
        //Obtenemos todas las notificaciones
        $notificationsList = Notification::getAllNotifications();

        //Obtenemos al usuario para obtener sus notificaciones
        $user = User::findByUsername($username);


        return
            [
                'notificationsList' => $notificationsList,
                'userNotifications' => $user->notifications
            ];
    }

    public function saveUserNotifications(Request $request,$username){
        //Obtenemos al usuario para obtener sus notificaciones
        $user = User::findByUsername($username);
        $data= $request->all();
        //Arreglo de Ids de notificaciones
        parent::LogObject($data);

        //Hacemos un sync para eliminar las relaciones que ya existen y agregar las nuevas
        $user->notifications()->sync($data);

    }*/
    public function updatePassword(UpdatePasswordRequest $request )
    {
        $input = $request->all();
        $this->user->password = bcrypt( $input["password"] ) ;

        if (!$this->user->save()) {
        return Response::json([
            'error' => "Error al realizar cambio de contraseña."
        ], 200);
        }

        return Response::json([
            'success' => "Contraseña actualizada exitosamente."
        ], 200);


    }
}
