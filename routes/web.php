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
    return redirect('home');
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

	Route::get('/inspectionIndex', 'InspectionController@showIndex')->name('inspectionIndex');
	Route::get('/inspectionItem', 'InspectionController@showItem')->name('inspectionItem');
	Route::post('/inpectionDestroy', 'InspectionController@destroy')->name('inspectionDestroy');
	Route::get('/securityView', 'InspectionController@securityView')->name('securityView');

	Route::get('/kpiManagement', 'KpiManagementController@show')->name('kpiManagement');
	Route::get('/kpi/kpi-creation-form', 'KpiManagementController@getKpiCreationForm')->name('kpi_creation_form');
	Route::get('kpi/question/form', 'KpiManagementController@getQuestionForm')->name('kpi_create_question');
	Route::post('kpi/question/handleform', 'KpiManagementController@handleQuestionForm')->name('kpi_create_question_handler');// deprecated
	Route::get('kpi/detail','KpiManagementController@getKpiDetail')->name('kpi_detail');
	Route::post('/questionStore', 'KpiManagementController@questionStore')->name('questionStore');
	Route::post('/kpi/create', 'KpiManagementController@createKPI')->name('createKpi');
	Route::post('/kpi/deactivate', 'KpiManagementController@deactivateKPI')->name('deactivateKpi');
	Route::get('/kpi/question-cateogry','KpiManagementController@getQustionCategory');


	Route::get('/user/createStuff', 'UserController@createStuff')->name('user.createStuff');
	Route::get('/user/createSecurity', 'UserController@createSecurity')->name('user.createSecurity');
	Route::get('/user/editSecutiy', 'UserController@editSecurity')->name('user.editSecutiy');
	Route::post('/user/editSecurityUpdate', 'UserController@editSecurityUpdate')->name('user.editSecurityUpdate');

	Route::post('/storeStuff', 'UserController@storeStuff')->name('user.storeStuff');
	Route::post('/storeSecurity', 'UserController@storeSecurity')->name('user.storeSecurity');

	Route::get('location', 'LocationController@showMap')->name('location');
	Route::get('editLocation', 'LocationController@editLocation')->name('editLocation');
	Route::post('editLocationStore', 'LocationController@editLocationStore')->name('editLocationStore');
	Route::post('location/addMap', 'LocationController@addMap')->name('locationAddMap');
	Route::post('location/delete', 'LocationController@destroyMap')->name('deleteLocation');


});
// Route::post('/inspectionStore', 'InspectionController@storee')->name('inspectionStore');

