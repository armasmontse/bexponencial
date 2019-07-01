<?php

Route::group(['prefix' => '{parent}' ], function(){
    Route::get('/',  function () {
         return view("users.parents.home");
    })->name("home");

});
