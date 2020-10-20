<?php

use Illuminate\Support\Facades\Route;
Broadcast::routes(['middleware' => ['auth:api']]);

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

Route::post('/login', 'Auth\UserController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', 'Auth\UserController@user');
    Route::get('/rooms/public', 'Api\RoomController@rooms');
    Route::get('/rooms/{id}', 'Api\RoomController@show');
    Route::get('/rooms/join/{room}', 'Api\RoomController@join');

    Route::post('/message/create', 'Api\MessageController@create');
});
