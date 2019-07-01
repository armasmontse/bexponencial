<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public static function getAllFaqs(){
       return Faq::all();
    }

}
