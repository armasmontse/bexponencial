<?php

namespace App\Models\Users;
use Illuminate\Database\Eloquent\Model;

class User_Info extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'full_Name',
        'birth_date',
        'photo',
    ];

    /**
     * Creamos la relación de user_info con user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Creamos el registro de la informacion del usuario
     */
    public static function CreateInfo($id,$name,$address)
    {
        return static::create([
             'user_id'      => $id,
              'address_id'      => $address,
            'full_Name'     => trim($name),
            'birth_date'     => trim("2018-10-01"),
            'photo'     => ""
        ]);
    }
    public static function setPathFile($user){


            return "public/images/students/$user/profile";


    }

    /**
     * Creamos la relación de user_info con address
     */
    public function address()
    {
        return $this->belongsTo("App\Models\Users\Address");
    }

    /**
     * Creamos la relación de user_info con school
     */
    public function school()
    {
        return $this->belongsTo("App\Models\Users\Schools\School");
    }
}
