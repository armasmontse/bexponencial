<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
  protected $fillable = ['label'];
  public $timestamps = false;
    public function users(){
      return $this->belongsToMany(User::class);
    }
}
