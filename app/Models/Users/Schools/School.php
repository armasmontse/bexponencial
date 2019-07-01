<?php

namespace App\Models\Users\Schools;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'code',
        'address_id'
    ];
    public function user()
    {
        return $this->hasOne("App\Models\Users\User_Info");
    }
    public function address()
    {
        return $this->hasOne("App\Models\Users\Address");
    }
    public static function createSchool(){
        return static::create([
            'name'     => trim($name),
            'code'         => static::createUniqueCode(),
            'address_id'      => $address,
        ]);
    }
    public static function createUniqueCode(){

        return "ABC";
    }
}
