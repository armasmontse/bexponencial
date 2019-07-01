<?php

namespace App\Models\Users\Plans;

use Illuminate\Database\Eloquent\Model;

class Payment_Type extends Model
{
    protected $fillable = [
        'id',
        'label'
    ];
}
