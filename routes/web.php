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
    Route::get('/', HomeController::class);
});

Route::get('/accommodation/{accommodationid}', 'App\Http\Controllers\Site\AccommodationController@index');
Route::get('/autocomplete-search-query', [\App\Http\Controllers\Site\SearchController::class, 'query'])->name('autocomplete.search.query');


Route::get('/importxml', [App\Http\Controllers\ReadXMLController::class, 'index']);

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('dashboard');
Route::get('/admin/shelves', 'App\Http\Controllers\Backend\ShelvesController@index')->name('prateleiras');
Route::get('/admin/shelves/edit', 'App\Http\Controllers\Backend\ShelvesController@edit')->name('shelf.edit');
Route::get('/admin/shelves/update', 'App\Http\Controllers\Backend\ShelvesController@update')->name('shelf.update');
Route::post('/admin/shelves/create', 'App\Http\Controllers\Backend\ShelvesController@create')->name('shelf.create');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::post('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::post('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::post('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

