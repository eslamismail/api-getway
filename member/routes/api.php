<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'member'], function () {
    Route::get('{room}/check/{member}', 'MemberController@check');
    Route::get('{room}/join/{member}', 'MemberController@join');
    Route::get('{room}/users', 'MemberController@users');
    Route::get('{room}/delete/{user}', 'MemberController@delete');

});
