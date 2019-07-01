<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Users', 'as' => 'profile.'], function () {

    //Route::get('/info/{user}', 'UserController@personalData2');
    //Route::get('/saveInfo/{user}', 'UserController@updateInfo');
    Route::get('/info/{user}', 'UserController@show');
    Route::post('/infou/{user}', 'UserController@update');
    //Route::resource('/info', 'UserController', ['only' => ['index', 'update', 'show']]);
    Route::put('/infowp/{user}', 'UserController@UpdateUserWithPassword');
    //Route::get('/config/{user}', 'UserController@userNotifications');
    //Route::put('/config/{user}', 'UserController@saveUserNotifications');
    //Route::put('/password', 'UserController@updatePassword');
    Route::get('/faq', 'FaqController@Faqs');
    Route::get('/achievements', 'StatusController@getAchievementsInfo');
    Route::get('/progress', 'StatusController@getProgress');
    Route::get('/ranking/{filter}', 'StatusController@getRanking');
    /* Metodos de pago */
    Route::get('/getCreditCards', 'UserPaymentMethodController@getCards');
    Route::post('/savePaymentMethod', 'UserPaymentMethodController@savePaymentMethod');
    Route::post('/changeDefaultCard', 'UserPaymentMethodController@changeDefaultCard');
    //Route::post('/createOrder', 'UserPaymentMethodController@createOrder');
});

Route::group(['namespace' => 'Platform', 'as' => 'map.'], function () {
    Route::get('/map/{block}', 'VillageController@userProgressMap');
    Route::get('/missions/{village}', 'VillageController@userProgressVillage');
    Route::get('/challenges/{mission}', 'VillageController@userProgressMissions');
    Route::get('/questions/{challenge}', 'ChallengeController@getQuestions');
    Route::post('/answer', 'AnswerController@storeAnswer');
    Route::get('/getRandomAnswer/{question}', 'AnswerScoresController@getRandomAnswerByQuestion');
    Route::post('/ratingAnswer', 'AnswerScoresController@storeRatingAnswer');
    /*Secret file*/
    Route::get('/secretFile/{village}', 'SecretFileController@showPriceFile');
    Route::get('/purchaseSecretFile/{village}', 'SecretFileController@purchaseSecretFile');
    /*Rutas del drive*/
    Route::get('/getLevels', 'LevelController@getLevels');
    Route::get('/getBlocks/{level}', 'BlockController@getBlocks');
    Route::get('/getDataByMission/{mission}', 'ChallengeController@getDataByMission');

});
