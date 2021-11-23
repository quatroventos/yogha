<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('App\Http\Controllers\Site')->group(function(){
    Route::get('/', 'HomeController');
    Route::get('/accommodation/{accommodationid}', 'AccommodationController@index');
    Route::get('/autocomplete-search-query', 'SearchController@query')->name('autocomplete.search.query');
    Route::get('/searchbydistrict/{district}', 'SearchController@searchbydistrict');
});

Route::get('/importxml', 'App\Http\Controllers\ReadXMLController@index');

Auth::routes();

Route::namespace('App\Http\Controllers\Backend')->group(function() {
    Route::get('/admin', 'AdminController@index')->name('dashboard');
    Route::get('/admin/shelves', 'ShelvesController@index')->name('prateleiras');
    Route::get('/admin/shelves/edit', 'ShelvesController@edit')->name('shelf.edit');
    Route::get('/admin/shelves/update', 'ShelvesController@update')->name('shelf.update');
    Route::post('/admin/shelves/create', 'ShelvesController@create')->name('shelf.create');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Backend\ProfileController@edit']);
	Route::post('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Backend\ProfileController@update']);
	Route::post('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Backend\@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::post('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

