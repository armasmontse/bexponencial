<?php

namespace App\Models\Users\Plans;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'plan_name',
        'price'
    ];
}
