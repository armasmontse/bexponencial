<?php

Route::group(['prefix' => '{student}' ], function(){
    Route::get('/', 'Users\UserController@index')->name("home");
    //Route::get('configuration/', 'Users\UserController@configSettings')->name("config");
});
