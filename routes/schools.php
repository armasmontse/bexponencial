<?php

Route::group(['prefix' => '{school}' ], function(){
    Route::get('/',  function () {
         return view("users.schools.home");
    })->name("home");
});
