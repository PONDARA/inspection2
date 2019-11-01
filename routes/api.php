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

Route::middleware('auth:api')->group(function(){
	Route::post('/inspectionStore', 'MobileController@storeInspection')->name('inspectionStore');
	Route::post('/inspectionList', 'MobileController@inspectionList')->name('inspectionList');
});
Route::post('login', 'MobileController@login')->name('login');
