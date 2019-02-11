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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/getapirough','ProfileController@index');
Route::post('/Register','ProfileController@create');
Route::post('/createProfile','ProfileController@addMore');
Route::post('/addRole','RoleController@create');
Route::get('/login','ProfileController@login');
//Route::get('/getuserapi/{id}','ProfileController@datadisplayapiVid');
Route::group(['middleware'=>'auth:api'],function(){
    Route::apiResource('details', 'API\UserController');
});
Route::group(['middleware'=>'auth:api'],function(){
   // Route::apiResource('events', 'ProfileController',['except' => ['index','show']]);
    Route::post('get-details', 'API\ProfileController@create');
});