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
Route::post('/Register','ProfileController@create');//WORKING
Route::post('/createProfile','ProfileController@addMore');//WORKING
Route::post('/addRole','RoleController@create');//NOT WORKING
Route::put('/block/{id}','ProfileController@block');//NOT TESTED
Route::get('/showUser','ProfileController@showUser');//WORKING
Route::get('/showUserById/{id}','ProfileController@showUserById');//WORKING
Route::delete('/delete/{id}','ProfileController@delete');//WORKING
//->Route::get('/showProduct/{id}','ProfileController@showProductById');
Route::put('/updateUser/{id}','ProfileController@updateUser');//WORKING

Route::post('/login','ProfileController@login');//LEFT
//Route::get('/getuserapi/{id}','ProfileController@datadisplayapiVid');
Route::get('/createOrder','OrderController@request');//LEFT

Route::group(['middleware'=>'auth:api'],function(){
    Route::apiResource('details', 'API\UserController');
});
Route::group(['middleware'=>'auth:api'],function(){
   // Route::apiResource('events', 'ProfileController',['except' => ['index','show']]);
    Route::post('get-details', 'API\ProfileController@create');
});