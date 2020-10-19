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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'room'], function () {
    Route::get('/', 'RoomController@index');
    Route::post('/create', 'RoomController@store');
    Route::get('/{id}', 'RoomController@show');
    Route::delete('/{id}', 'RoomController@destroy');
});
