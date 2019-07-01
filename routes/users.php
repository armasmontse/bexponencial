<?php

Route::group(['prefix' => '{users}' ], function(){
    Route::get('/',  function () {
         return view("users.home");
    })->name("home");

    Route::patch('/', 'Users\UserController@updateEmail')->name('email.update');
    Route::patch('password', 'Users\UserController@updatePassword')->name('password.update');
});
