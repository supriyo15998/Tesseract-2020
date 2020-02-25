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
Route::post('/registration/event/solo', 'Api\\RegisterController@enrollSolo');
Route::post('/registration/event/team', 'Api\\RegisterController@enrollTeam');
Route::post('/registration/event/naveen', 'Api\\RegisterController@enrollNaveen');
Route::get('/generic', 'Api\\GenericController@getGeneric');
Route::get('/events/{slug}', 'Api\\GenericController@getEventsWithSlug')->name('getEventsWithSlug');
// Route::get('/events', 'Api\\GenericController@getEvents');