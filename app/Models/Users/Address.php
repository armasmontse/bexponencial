<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'phone',
        'street',
        'street_no',
        'neighbourhood',
        'city',
        'state',
        'zip_code'
    ];

    public static function createAddress(){
        return static::create([
            'phone' => "",
            'street'=> "",
            'street_no'=> "",
            'neighbourhood'=> "",
            'city'=> "",
            'state'=> "",
            'municipality'=> "",
            'zip_code'=> ""
        ]);
    }
    public static function createSchoolAddress(array $input){
        return static::create([
            'phone' => $input['phone'],
            'street'=> $input['street'],
            'street_no'=> $input['street_no'],
            'neighbourhood'=> $input['neighbourhood'],
            'city'=> $input['city'],
            'state'=> $input['state'],
            'municipality'=> $input['municipality'],
            'zip_code'=> $input['zip_code']
        ]);
    }

    public function school(){
        return $this->hasOne("App\Models\Users\Schools\School");
    }

    public function user(){
        return $this->hasOne("App\Models\Users\User_Info");
    }
}
