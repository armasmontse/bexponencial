<?php

namespace App\Models\Users\Notifications;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     public $timestamps = true;



     public static function getAllNotifications(){
     	return Notification::all();
     }

     public function users()
     {
         return $this->belongsToMany('App\Models\Users\User');
     }

     public function scopeCollectNotificationsByType($query,$type){
         return $query->where([
             'type' => $type()
         ])->get();
     }
}
