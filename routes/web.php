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

//Rutas publicas
Route::get('/', 'HomeController@index');

Route::get('/recepciones', 'UsersController@receptions')->name('user.receptions');
Route::get('/proveedores', 'UsersController@providers')->name('user.providers');
Route::get('/novias', 'UsersController@girlfriend')->name('user.girlfriend');
Route::get('/novios', 'UsersController@boyfriend')->name('user.boyfriend');
Route::get('/provider/search/name', 'UsersController@search')->name('user.search');
Route::resource('blog', 'BlogsController');
Route::resource('user', 'UsersController');
Route::resource('albumPhoto', 'AlbumPhotosController');

Auth::routes(); /*rutas de autorizacion*/

//Facebook Login

Route::get('login/instagram', 'Auth\LoginController@redirectToProvider')->name('login.social');
Route::get('login/instagram/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/home', 'HomeController@index')->name('home');

//Rutas resource
Route::group(['middleware' => ['auth']], function () {
    Route::resource('task', 'TasksController', ['except' => 'create', 'show']);
    Route::resource('guest', 'GuestsController');
    Route::resource('group', 'GroupsController');
    Route::resource('menu', 'MenusController');
    Route::resource('budget', 'BudgetCategoriesController');
    Route::resource('spend', 'SpendsController');
    Route::resource('payment', 'PaymentsController');
    Route::resource('request', 'ProviderRequestsController');
    Route::resource('like', 'LikesController');
    Route::resource('album', 'AlbumsController');
    Route::post('request/{id}', 'ProviderRequestsController@store');
    Route::get('/marrige', 'MarrigesController@index')->name('marrige.index');
    Route::put('/task/{id}/update_status', 'TasksController@updateStatus')->name('task.update_status');
    Route::get('/payment/{id}/edit_aternative', 'PaymentsController@edit_alternative')->name('payment.edit_alternative');
    Route::put('/payment/{id}/update_alternative', 'PaymentsController@update_alternative')->name('payment.update_alternative');
    Route::get('/bugdet/pdf', 'BudgetCategoriesController@pdf')->name('budget.pdf');
    Route::get('/provider/bySector', 'UsersController@bySector')->name('user.bySector');
});

Route::group(['middleware' => ['admin']], function () {
    Route::resource('taskCategory', 'TaskCategoriesController', ['except' => 'create', 'show']);
    Route::resource('color', 'ColorsController');
    Route::resource('weather', 'WeathersController');
    Route::resource('style', 'StylesController');
    Route::resource('sector', 'SectorsController');
    Route::resource('tag', 'BlogTagsController');
    Route::get('/admin/providers', 'UsersController@adminProviders')->name('user.adminProviders');
    Route::get('/admin/user/list', 'UsersController@index')->name('user.index');
    Route::delete('/admin/user/delete/{id}', 'UsersController@destroy')->name('user.delete');
});

Route::group(['middleware' => ['provider']], function () {
    Route::resource('photo', 'PhotosController');
    Route::resource('video', 'VideosController');
    Route::resource('faq', 'FaqsController');
});
