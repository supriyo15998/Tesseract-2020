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
Route::post('/registration/volunteer', 'Api\\RegisterController@registerV')->name('registerV');
Route::post('/registration/campuss-ambassador', 'Api\\RegisterController@registerC')->name('registerC');
Route::get('/generic/departments', 'Api\\GenericController@getDepartments');
Route::get('/events', 'Api\\GenericController@getEvents');