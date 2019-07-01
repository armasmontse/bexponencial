<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login:post');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register:get');
Route::post('register', 'Auth\RegisterController@register')->name('register:post');
Route::post('conekta-webhook', 'Users\UserPlanController@webhookResponse');
//Social Media Authentication Routes
Route::get('Auth/{provider}', 'Auth\SocialMediaAuthController@redirectToProvider')->name("social");
Route::get('Auth/{provider}/callback', 'Auth\SocialMediaAuthController@handleProviderCallback');

Route::get('/', function () {
    return view('splash');
});

Route::get('drive/{mission}', 'Users\PlanController@makeFakePlan');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('pass_reset:get');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('pass_reset_email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('pass_reset_token');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('pass_reset:post');
/*
Route::get('/mapa/{block}', 'Platform\VillageController@userProgressMap');
Route::get('/misiones/{user}/{village}', 'Platform\VillageController@userProgressVillage');
Route::get('/retos/{user}/{mission}', 'Platform\VillageController@userProgressMissions');
Route::get('/preguntas/{user}/{challenge}', 'Platform\ChallengeController@getQuestions');*/
