<?php

Route::get('/', 'Admin\AdminController@index')->name('index');

Route::group(['middleware' => ['permission:manage_users'] ,'prefix' => 'users', 'as' => 'users.'], function(){
    Route::resource('/', 'Admin\Users\ManageUserController',
        ['only'         => ['index', 'create', 'edit', 'store', 'update'],
        'parameters'    => ['' => 'user_editable']
    ]);

    Route::resource('/', 'Admin\Users\ManageUserController',
        ['only'         => ['destroy'],
        'parameters'    => ['' => 'erasable_user']
    ]);

    Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.'  ,'prefix' => 'ajax' ], function(){
        Route::patch( '{user_editable}/roles' , 'Admin\Users\ManageUserController@roles')->name('roles');
    });


    Route::get('trash', 'Admin\Users\ManageUserController@trash')->name('trash');
    Route::patch('trash/{user_trashed}', 'Admin\Users\ManageUserController@recovery')->name('recovery');
});

Route::group(['middleware' => ['permission:manage_schools'] ,'prefix' => 'schools', 'as' => 'schools.'], function(){
    Route::resource('/', 'Admin\Schools\ManageSchoolsController',
        ['only'         => ['index', 'create', 'edit', 'store', 'update'],
        'parameters'    => ['' => 'user_editable']
    ]);

    Route::resource('/', 'Admin\Schools\ManageSchoolsController',
        ['only'         => ['destroy'],
        'parameters'    => ['' => 'erasable_user']
    ]);

    Route::group(['middleware' => ['onlyajax'], 'as' => 'ajax.'  ,'prefix' => 'ajax' ], function(){
        Route::patch( '{user_editable}/roles' , 'Admin\Schools\ManageSchoolsController@roles')->name('roles');
    });


    Route::get('trash', 'Admin\Schools\ManageSchoolsController@trash')->name('trash');

});
