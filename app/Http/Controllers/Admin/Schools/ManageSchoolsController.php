<?php
namespace App\Http\Controllers\Admin\Schools;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Schools\SchoolCreateRequest;
use App\Http\Requests\Admin\Users\AssociateRolesUserRequest;

use App\Notifications\Users\ActivationAccountNotification;

use App\Models\Users\User;
use App\Models\Users\Role;
use App\Models\Users\Schools\School;
use App\Models\Users\Address;
use App\Models\Settings\Country;

use Redirect;
use Response;

class ManageSchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Regreso a la vista de index la informacion de los usuarios

        $data = [
            "states" => Country::getMexicoStates()
        ];
        return view('admin.schools.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "states" => Country::getMexicoStatesiWithMunicipies()
        ];
        return view('admin.schools.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolCreateRequest $request)
    {
        $input = $request->all();
        $address = Address::createSchoolAddress($input);
        $school = School::createSchool($input["name"],$address->id);


        if (!$school) {
            //return Redirect::back()->withErrors([trans('manage_users.create.error')]);
        }



        return Redirect::route('admin::schools.create')->with('status', trans('manage_users.create.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user_editable)
    {
        $data = [
            //"user_edit"      => $user_editable,
            //'roles'         => Role::getForThisUser($this->user)->get(),
        ];

        //Regreso a la vista de index la informacion de los usuarios
        return view('admin.schools.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user_editable)
    {
        $input = $request->all();

        //Actualizo Solo los campos visibles
        $user_editable->first_name =$input['first_name'];
        $user_editable->last_name  =$input['last_name'];
        $user_editable->email      =$input['email'];

        if (!$user_editable->save()) {
            return Redirect::back()->withErrors([trans('manage_users.edit.error')]); //Enviar el mensaje con el idioma que corresponde
        }



        return Redirect::route('admin::users.edit', [$user_editable->id])->with('status', trans('manage_users.edit.success'));
    }

    public function roles(AssociateRolesUserRequest $request, User $user_editable)
    {
        $input = $request->all();
        $roles = isset($input["roles"]) ? $input["roles"] : [];

        $user_editable->roles()->sync($roles);

        return Response::json([ // todo bien
            'data'    => $user_editable->load("roles")->roles_ids,
            'message' => [trans('manage_users.associate.roles.success')],
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $erasable_user)
    {
        if (!$erasable_user->delete()) {
            return Redirect::back()->withErrors([trans('manage_users.delete.error')]);
        }

        return Redirect::route('admin::users.trash')->with('status', trans('manage_users.delete.success'));
    }

    public function trash()
    {
        $data = [
            "users_disabled" => User::with("roles")->onlyTrashed()->SuperAdminFilter($this->user)->get()
        ];
        return view('admin.users.trash', $data);
    }

    public function recovery(User $user_trashed)
    {
        if (!$user_trashed->restore()) {
            return Redirect::back()->withErrors([trans('manage_users.recovery.error')]);
        }

        return Redirect::route('admin::users.index')->with('status', trans('manage_users.recovery.success'));
    }
}