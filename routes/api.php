<?php

use Illuminate\Http\Request;
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
Route::get('/get/last-ten-areas/check/websocket','AreaController@get_last_ten_rows');
Route::post('/login','AuthController@authenticate');

Route::middleware('jwt.auth')->get(
    '/area', 'AreaController@index'
);
Route::middleware('jwt.auth')->post(
    '/save/area/check/websocket', 'AreaController@store'
);

