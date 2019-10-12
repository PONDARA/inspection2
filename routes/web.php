<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('/inpectionIndex', 'InspectionController@showIndex')->name('inspectionIndex');
	Route::get('/inpectionItem', 'InspectionController@showItem')->name('inspectionItem');

	Route::get('/kpiManagement', 'kpiManagementController@show')->name('kpiManagement');

	Route::get('/user/createStuff', 'userController@createStuff')->name('user.createStuff');
	Route::get('/user/createSecurity', 'userController@createSecurity')->name('user.createSecurity');

	Route::post('storeStuff', 'UserController@storeStuff')->name('user.storeStuff');
	Route::post('storeSecurity', 'UserController@storeSecurity')->name('user.storeSecurity');

	Route::get('location', 'LocationController@showMap')->name('location');
	Route::post('location/addMap', 'LocationController@addMap')->name('locationAddMap');
});
// Route::post('/inspectionStore', 'InspectionController@storee')->name('inspectionStore');
